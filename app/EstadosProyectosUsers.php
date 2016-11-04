<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosProyectosUsers extends Model
{
    protected $table = 'estadosproyectosusers';
    public $timestamps = false;

    protected $fillable = [
        'id', 'estado'
    ];
}
