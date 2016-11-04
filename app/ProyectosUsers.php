<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectosUsers extends Model
{
    protected $table = 'proyectosusers';
    public $timestamps = false;

    protected $fillable = [
        'proyectos_id', 'users_id', 'estadosproyectosusers_id'
    ];

    public function proyecto()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }
}
