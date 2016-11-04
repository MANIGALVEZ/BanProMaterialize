<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $fillable=
    [
     'linea',
    ];

    public function lineaproyecto()
    {
        return $this->hasMany('App\LineaProyecto');

    }
}
