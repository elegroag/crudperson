<?php

namespace crudperson;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'emails';
    protected $fillable = [
    	'asunto', 
    	'contenido',
    	'users_id',
    	'personas_id'
    ];

    public function personas()
    {
    	return $this->hasMany('crudperson\Personas');
    }

    public function users()
    {
    	return $this->hasMany('crudperson\Users');
    }
}
