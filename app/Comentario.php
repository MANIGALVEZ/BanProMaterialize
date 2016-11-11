<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	protected $table = 'comentarios';
    protected $fillable = [
        'comentario','proyecto_id', 'usuario_id',
    ];

    public function proyecto()
    {
        return $this->hasOne('App\Proyecto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
