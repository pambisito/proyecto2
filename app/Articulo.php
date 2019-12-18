<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $primaryKey = 'codArticulo';

    protected $fillable = [
        'nombre', 'descripcion', 'precioUnidad', 'stock',
    ];
}
