<?php

namespace crudperson;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';
    protected $fillable = [
    	'nombres',
    	'apellidos',
    	'documneto',
    	'email',
    	'municipios_id'
    ];
    
    #entidad relacion foreign key.
    public function municipios()
    {
      return $this->hasMany('crudlara\Municipios');
    }
}
