<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proyecto;
use App\Linea;
use App\ProyectosUsers;
use App\EstadosdeProyectos;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       if(Auth::check()){
            if(Auth::user()->tiporol == 'gestor')
            {
                $lineas = Linea::all();
                $iprs=ProyectosUsers::all();
                $query = Proyecto::where('estadosdeproyectos_id', '<>', '1')
                    ->orderBy('id','ASC')
                    ->paginate(3);
                return view('gestor.index', compact('query', "lineas", 'iprs'));

            }
        }

        if(Auth::check()){
            if(Auth::user()->tiporol == 'usuario')
            {
                $lineas = Linea::all();
                $iprs=ProyectosUsers::all();
                $query = Proyecto::orderBy('id','ASC')->paginate(3);
                return view('gestor.index', compact('query', "lineas", 'iprs'));

            }
        }
    }
}
