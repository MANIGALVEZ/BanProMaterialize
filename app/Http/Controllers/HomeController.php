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

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        Direcciona a interfaz Welcome
        return redirect('/');
    }



}
