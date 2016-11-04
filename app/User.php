<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'nameu', 'apellidos', 'email', 'celular', 'titulos',
        'estado','password', 'tiporol' 
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function proyecto()
    {
        return $this->hasOne('App\Proyecto');
    }

    public function comentario()
    {
        return $this->hasOne('App\Comentario');
    }

    public function proyectosuser()
    {
        return $this->hasMany('App\ProyectosUsers');

    }
}
