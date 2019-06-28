<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
	protected $table = 'catalogo';
      protected $fillable = [
      						 'Nombre', 
      						 'Descripcion',
      						 'Precio',
      						 'Unidad_medida',
      						 'Marca',
      						 'activo',
      						 'created_at',
      						 'updated_at',
      						];
}
