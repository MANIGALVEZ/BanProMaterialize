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

    //Funcion para dirigir a interfaz principal
	public function index()
    {
        $query = Proyecto::orderBy('id','ASC')->paginate(3);
        $lineas = Linea::all();
        $iprs = ProyectosUsers::all();
        $estados = EstadosdeProyectos::all();
        return view('gestor.index', compact('query', 'lineas', 'iprs', 'estados'));
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
        $file = $request->file('file');
        $direccion = $file->getClientOriginalName();

        $proyecto = new Proyecto();
        $proyecto->nombrep = $request->get('nombrep');
        $proyecto->sectorenfocado = $request->get('sectorenfocado');
        $proyecto->empresa = $request->get('empresa');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->usuario_id = Auth::user()->id;
        $proyecto->imagen = 'imagenes/proyectos/'.$direccion;
        $proyecto->estadosdeproyectos_id = "2";
        $request->file('file')->move(base_path().'/public/imagenes/proyectos/', $direccion);
        $proyecto->save();

        $lineas = $request->get("lineatecnologica");
        foreach ($lineas as $key => $linea) {
            $linea_proyecto = new LineaProyecto;
            $linea_proyecto->proyectos_id = $proyecto->id;
            $linea_proyecto->lineas_id    = $linea;
           $linea_proyecto->save();

        }
        return redirect("proyectos/create");

	}


    //Funcion para guardar y mostrar valores en el modal
    public function resumenProyecto(Request $request)
    {
        $proyecto = Proyecto::find($request->get("idProyecto"));
        $proyecto->estadosdeproyectos_id = $request->get("idEstado");
        $proyecto->resumen = $request->get('texto');
        $proyecto->save();

        return redirect("home");

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
                ->paginate(3);
            $iprs = ProyectosUsers::all();
            return view('selectestados', compact('query', 'iprs'));
    }


    // Funcion buscar proyectos por nombre: El gestor por medio del aplicativo tendrá la opcion de buscar los proyectos o filtrar por fecha
    public function searchName(Request $request)
    {
        $lineas = Linea::all();
        $query =Proyecto::where('nombrep', 'LIKE', '%'.$request->get('nombrep').'%')
            ->orderBy('id', 'ASC')
            ->paginate(3)
            ->setPath('home');
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
        return view('gestor.showp', compact('query', "lineas_proyecto", "comentariop"));
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
        return redirect('/home');

    }



    //Funcion Actualizar estado de proyecto en BD
    public function estado(Request $request){
        $proyecto = Proyecto::find($request->get("idp"));
        $proyecto->estadosdeproyectos_id = $request->get("ide");
        $proyecto->save();
    }



    //Funcion que permite ver los  proyectos inscritos
    public function misproyectos(){

        $iprs = ProyectosUsers::all();
        $lineas = Linea::all();
        $query = \DB::table('proyectos')
            ->join('proyectosusers', 'proyectos.id', '=', 'proyectosusers.proyectos_id')
            ->select('proyectos.*', 'proyectosusers.estadosproyectosusers_id')
            ->where('proyectosusers.users_id', '=', Auth::user()->id)
            ->orderBy('id','ASC')->paginate(3);
        return view('gestor.index', compact('query', 'iprs', 'lineas'));

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
			$query = User::orderBy('id','ASC')->paginate(2);
            // dd($query);
            return view('gestor.usuarios', compact('query'));
		}


        //usuarios asociados a proyectos
        public function usuariosshow($id)
        {
            $query = User::find($id);
            $proyectosusers= ProyectosUsers::where("users_id", $id)->get();
            //dd($proyectosusers);
            return view('gestor.proyectosusers', compact('query', 'proyectosusers'));

        }


    //Funcion para dirigir a interfaz: En Banco
    public function proyectosBanco()
    {
        $lineas = Linea::all();
        $iprs=ProyectosUsers::all();
        $query = Proyecto::where('estadosdeproyectos_id', '=', '1')
            ->orderBy('id','ASC')
            ->paginate(3);
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
}
