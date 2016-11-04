<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaProyecto extends Model
{
	protected $table = "lineasproyectos";
	public $timestamps = false;
    
    public function proyecto()
    {
    	return $this->belongsToMany('App\Proyecto');
    }

    public function linea()
    {
        return $this->belongsTo('App\Linea');
    }
}
