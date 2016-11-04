<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosdeProyectos extends Model
{
    protected $fillable=
        [
            'estado',
        ];

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');

    }

//    public function listarProyecto($query, $estado)
//    {
//        if (trim($estado) !="")
//        {
//
//            $query->where('estado', "LIKE", "%$estado%");
//        }
//        else
//        {
//            return view('gestor.index')->with('message', 'estado no encontrado!!');
//        }
//    }
}
