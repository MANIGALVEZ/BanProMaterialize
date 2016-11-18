<?php

namespace App\Http\Controllers;

use App\EstadosdeProyectos;
use App\EstadosProyectosUsers;
use App\ProyectosUsers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\LineaProyecto;
use App\User;
use App\Comentario;
use App\Http\Requests;
use Auth;
use App\Linea;



class ProyectosController extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Funcion para dirigir a interfaz principal
	public function index()
    {
        $lineas = Linea::all();
        $iprs=ProyectosUsers::all();
        $query = Proyecto::where('estadosdeproyectos_id', '<>', "1")
            ->orderBy('id', 'ASC')
            ->paginate();
        return view('gestor.index', compact('query', "lineas", 'iprs'));

    }




    //Funcion create para direccionar a vista/ El usuario por medio del aplicativo espera tener una interfaz que permita registrar su proyecto
    public function create()
    {
        $lineas = Linea::all();
    	return view('usuario.registrarproyectos', compact("lineas"));
    }



    //Funcion store para guardar en BD/ El usuario por medio del aplicativo espera tener una interfaz que permita registrar su proyecto
    public function store(Request $request)
    {

        $image = $request->file('image');
        $proyecto = new Proyecto();
        $proyecto->nombrep = $request->get('nombrep');
        $proyecto->sectorenfocado = $request->get('sectorenfocado');
        $proyecto->empresa = $request->get('empresa');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->usuario_id = Auth::user()->id;
        $proyecto->estadosdeproyectos_id = "2";

        if($image != "")
            {
            $ruta = $image->getClientOriginalName();
            $proyecto->imagen = 'imagenes/proyectos/' . $ruta;
            $image->move(base_path() . '/public/imagenes/proyectos/', $ruta);
            }

        $proyecto->save();

            $lineas = $request->get("lineatecnologica");
//Decision $lineas: En caso del usuario
            if($lineas != "")
            {
                foreach ($lineas as $key => $linea)
                {
                $linea_proyecto = new LineaProyecto;
                $linea_proyecto->proyectos_id = $proyecto->id;
                $linea_proyecto->lineas_id = $linea;
                $linea_proyecto->save();
                }
            }
            return redirect("proyectos/create");
	}


    //Funcion para guardar y mostrar valores en el modal
    public function resumenProyecto(Request $request)
    {
        if(Auth::user()->tiporol == 'usuario'){
        $proyecto = Proyecto::find($request->get("idProyecto"));
        $proyecto->estadosdeproyectos_id = $request->get("idEstado");
        $proyecto->resumen = $request->get('texto');
        $proyecto->save();

        return redirect("home");
        }else{
            return redirect("/home");
        }
    }


    //Funcion para consultar el contenido del campo resumen en la tabla proyectos
    public function consultaProyecto($idp)
    {
        $proyecto = Proyecto::find($idp);
        return $proyecto->resumen;

    }


    // Funcion: El usuario desea poder ver el banco de proyectos en estado: "reclutando"
    public function listarProyecto($lip)
    {
            $query =Proyecto::where('estadosdeproyectos_id', '=', $lip)
                ->orderBy('id', 'ASC')
                ->paginate();
            $iprs = ProyectosUsers::all();
            return view('selectestadoslineas', compact('query', 'iprs'));

    }


    // Funcion buscar proyectos por nombre: El gestor por medio del aplicativo tendrá la opcion de buscar los proyectos o filtrar por fecha
    public function searchName(Request $request)
    {
        $lineas = Linea::all();
        $query =Proyecto::where('estadosdeproyectos_id', '<>', "1")
            ->where('nombrep', 'LIKE', '%'.$request->get('nombrep').'%')
            ->orderBy('id', 'ASC')
            ->paginate();
        $iprs=ProyectosUsers::all();
        return view('gestor.index', compact('query','iprs', 'lineas'));
    }



    // Funcion buscar proyectos por fecha: El gestor por medio del aplicativo tendrá la opcion de buscar los proyectos o filtrar por fecha
    public function searchDate(Request $request)
    {
        //Buscar por fecha
        $from  = $request->get("bd-desde");
        $to    = $request->get("bd-hasta");

        if ($from == $to)
        {
            $query = Proyecto::where("created_at", "LIKE", "%$from%")->paginate(3);
        }
        else
        {
            $query = Proyecto::whereBetween("created_at", [$from, $to])->paginate(3);
        }

        $iprs=ProyectosUsers::all();
        return view('gestor.index', compact('query','iprs'));

    }


    // Funcion detalles proyectos
    public function show($id){
        $query = Proyecto::find($id);
        $lineas_proyecto = LineaProyecto::where("proyectos_id", $id)->get();
        $comentariop = Comentario::where("proyecto_id", $id)->get();
        $proyectos = ProyectosUsers::where("proyectos_id", $id)->get();
        $proyectos2 = ProyectosUsers::where("proyectos_id", $id)->where("estadosproyectosusers_id", 1)->get();
        $usuarios = [];
        $usuarios2 = [];
        foreach($proyectos as $key => $proyecto){
            array_push($usuarios, User::find($proyecto->users_id));
        }
        foreach($proyectos2 as $key2 => $proyecto2){
            array_push($usuarios2, User::find($proyecto2->users_id));
        }
        return view('gestor.showp', compact('query', "lineas_proyecto", "comentariop", "usuarios", "usuarios2"));
    }



    // Funcion vincularse a un proyecto
    public function inscribir($id)
    {
        $user= Auth::user()->id;
        $ipr = new ProyectosUsers();
        $ipr->proyectos_id = $id;
        $ipr->users_id = $user;
        $ipr->estadosproyectosusers_id = 2;
        $ipr->save();
        return redirect('/proyectos');

    }



    //Funcion Actualizar estado de proyecto en BD
    public function estado(Request $request){
        $proyecto = Proyecto::find($request->get("idp"));
        $proyecto->estadosdeproyectos_id = $request->get("ide");
        $proyecto->save();
    }



    //Funcion que permite ver los  proyectos inscritos
    public function misproyectos()
    {
        if(Auth::user()->tiporol == "usuario"){
            $iprs = ProyectosUsers::all();
            $lineas = Linea::all();
            $query = \DB::table('proyectos')
                ->where('estadosdeproyectos_id', '<>', "1")
                ->join('proyectosusers', 'proyectos.id', '=', 'proyectosusers.proyectos_id')
                ->select('proyectos.*', 'proyectosusers.estadosproyectosusers_id')
                ->where('proyectosusers.users_id', '=', Auth::user()->id)
                ->orderBy('id','ASC')->paginate(3);
            return view('gestor.index', compact('query', 'iprs', 'lineas'));
        }else {
            return redirect('/home');
        }


    }



    //Funcion para eliminar un proyecto: pasar a estado En Banco
        public function eliminarProyecto(Request $request)

        {
            $proyecto = Proyecto::find($request->get("idPro"));
            $proyecto->estadosdeproyectos_id = $request->get("idEliminar");
            $proyecto->resumen = $request->get('textoEliminar');
            $proyecto->save();

            return redirect("home");

        }



		// Mostrar usuarios
		public function usuarios(){
            if(Auth::user()->tiporol == 'gestor'){

                $query = User::orderBy('id','ASC')->paginate(2);
            // dd($query);
            return view('gestor.usuarios', compact('query'));
            }else{
                return redirect('/home');
            }
		}


        //usuarios asociados a proyectos
        public function usuariosshow($id)
        {
            if(Auth::user()->tiporol == 'gestor'){
                $query = User::find($id);
                $proyectosusers= ProyectosUsers::where("users_id", $id)->get();
                //dd($proyectosusers);
                return view('gestor.proyectosusers', compact('query', 'proyectosusers'));
        }else{
            return redirect('/home');
            }
        }


    //Funcion para dirigir a interfaz: En Banco
    public function proyectosBanco()
    {
        $lineas = Linea::all();
        $iprs=ProyectosUsers::all();
        $query = Proyecto::where('estadosdeproyectos_id', '=', '1')
            ->orderBy('id','ASC')
            ->paginate();
        return view('gestor.proyectosbanco', compact('query', "lineas", 'iprs'));
    }


    //Funcion para  mostrar proyectos de un usuario
    public function showup($id)
    {
        $user = ProyectosUsers::find($id);
        $lineas = Linea::all();
        $query = \DB::table('proyectos')
            ->join('proyectosusers', 'proyectos.id', '=', 'proyectosusers.proyectos_id')
            ->select('proyectos', 'proyectosusers.users_id')
            ->where('proyectosusers.users_id', '=', $user)
            ->orderBy('id','ASC')->paginate(3);
        dd($user);
        return view('gestor.showup', compact('query',  'lineas'));
       /* $query = ProyectosUsers::find($id);
        $users = \DB::table('proyectos')
            ->join('proyectosusers', 'p.id', '=', 'pu.proyecto_id')
            ->join('users', 'u.id', '=', 'pu.user_id')
            ->where('u.id','=', Auth::user()->id)
            ->get();
        return view('gestor.showup', compact('query', 'users'));
            */
       }


    //Funcion para filtrar por estado
    public function estadoProyectoUsuario(Request $request)
    {
        $prous = ProyectosUsers::find($request->get("idpro"));
        $prous->estadosproyectosusers_id = $request->get("idcam");
        $prous->save();
    }


    // Funcion: Filtrar por lineas (El gestor podra filtrar los proyectos según las diferentes lineas tecnologicas)
    public function listarLinea(Request $request)
    {
        $count = 0;
        $arrLineas = [];
        if($request->get("var1") != 0){ $count++; array_push($arrLineas, $request->get("var1"));}
        if($request->get("var2") != 0){ $count++; array_push($arrLineas, $request->get("var2"));}
        if($request->get("var3") != 0){ $count++; array_push($arrLineas, $request->get("var3"));}
        if($request->get("var4") != 0){ $count++; array_push($arrLineas, $request->get("var4"));}

        switch($count){
            case 1:
                $que = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[0])->get();
                $query = [];
                foreach($que as $key => $value){
                    array_push($query, Proyecto::find($value->proyectos_id));
                }
                break;

            case 2:
                $query = [];
                $que = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[0])->get();
                $que2 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[1])->get();
                foreach($que as $key => $value){
                    foreach($que2 as $key2 => $value2){
                        if($value->proyectos_id == $value2->proyectos_id){
                            array_push($query, Proyecto::find($value->proyectos_id));
                        }
                    }
                }
                break;

            case 3:
                $query = [];
                $que = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[0])->get();
                $que2 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[1])->get();
                $que3 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[2])->get();
                foreach($que as $key => $value){
                    foreach($que2 as $key2 => $value2){
                        foreach($que3 as $key3 => $value3){
                            if($value->proyectos_id == $value2->proyectos_id && $value2->proyectos_id == $value3->proyectos_id){
                                array_push($query, Proyecto::find($value->proyectos_id));
                            }
                        }
                    }
                }
                break;

            case 4:
                $query = [];
                $que = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[0])->get();
                $que2 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[1])->get();
                $que3 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[2])->get();
                $que4 = \DB::table('lineasproyectos')
                    ->where("lineas_id", $arrLineas[3])->get();
                foreach($que as $key => $value){
                    foreach($que2 as $key2 => $value2){
                        foreach($que3 as $key3 => $value3){
                            foreach($que4 as $key4 => $value4){
                                if($value->proyectos_id == $value2->proyectos_id && $value2->proyectos_id == $value3->proyectos_id && $value3->proyectos_id == $value4->proyectos_id){
                                    array_push($query, Proyecto::find($value->proyectos_id));
                                }
                            }
                        }
                    }
                }
                break;
        }
        return view('selectestadoslineas', compact('query'));

    }


    //Funcion que permite agregar conmentario a un proyecto X
    public function comentario(Request $request, $id)
    {   
        $comentario = New Comentario;
        $comentario->comentario  = $request->get("comentario");
        $comentario->proyecto_id = $id;
        $comentario->usuario_id  = Auth::user()->id;
        $comentario->save();
        
        return redirect("show/".$id);
    } 
}
