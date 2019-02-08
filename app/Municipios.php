<?php

namespace crudperson;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    protected $fillable = [
    	'muni_nombre', 
    	'departamentos_id'
    ];
    
    #entidad relacion foreign key.
    public function departamentos()
    {
      return $this->hasMany('crudlara\Departamentos');
    }

}
