<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Proyecto extends Model
{
    protected $fillable =
     [
        'nombrep', 'sectorenfocado','lineatecnologica',
        'descripcion', 'estadosdeproyectos_id', 'usuario_id',
    ];


   public function user()
   {
        return $this->belongsTo('App\User','usuario_id');
    }

    public function comentario()
    {
        return $this->belongsTo('App\Comentario');
    }

    public function papelera()
    {
        return $this->hasOne('App\Papelera');
    }

    public function lineaproyecto()
    {
        return $this->hasMany('App\LineaProyecto');
    }

    public function proyectosuser()
    {
        return $this->hasMany('App\ProyectosUsers');

    }


    public function scopeNombrep($query, $nombrep)
    {
        if (trim($nombrep) !="") {
            
            $query->where('nombrep', "LIKE", "%$nombrep%");
        }
        else {
            return view('gestor.index')->with('message', 'proyecto no encontrado!!');
        }
    }



    //Funcion Buscar por fecha
    public function scopeCreated_at($query, $created_at)
    {
        if (trim($created_at) !="") 
        {
            
            $query->whereDate("created_at", "LIKE", "%created_at%");

        }
        else {
            return view('gestor.index')->with('message', 'proyecto no encontrado!!');
        }
    }


    //Funcion para conectar tabla proyectos con tabla estados de proyectos
    public function estadosdeproyectos()
    {
        return $this->hasMany('App\EstadosdeProyectos');
    }




//    public function listarProyecto($query, $estadosdeproyectos_id)
//    {
//        if (trim($estadosdeproyectos_id) !="")
//        {
//
//            $query->where('estadosdeproyectos_id', "LIKE", "%$estadosdeproyectos_id%");
//        }
//        else
//        {
//            return view('gestor.index')->with('message', 'estado no encontrado!!');
//        }
//    }



}

