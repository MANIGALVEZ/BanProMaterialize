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

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

//    Direcciona a interfaz Welcome
    public function index()
    {
        $proyectos = Proyecto::where('estadosdeproyectos_id', '>', 2)->get();
        $estadosproyectos = \DB::table('estadosdeproyectos')->get();
        return view('proyectos.welcome', compact('proyectos', 'estadosproyectos'));
    }



}
