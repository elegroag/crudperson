<?php

namespace crudperson;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
  	protected $table = 'departamentos';
    protected $fillable = [
    	'depa_nombre', 
    	'paices_id'
    ];
    
    #entidad relacion foreign key.
    public function paices()
    {
      return $this->hasMany('crudperson\Paices');
    }

}
