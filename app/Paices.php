<?php
namespace crudperson;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paices extends Model
{
  use SoftDeletes;
  protected $table = 'paices';
  
  protected $fillable = ['pais_nombre'];
  protected $dates = ['created_at', '	updated_at'];

  #relacion inversa para consultar todos los pedidos de una mesa.
  public function departamentos()
  {
  	return $this->belongsTo('crudlara\Departamentos');
  }
}
