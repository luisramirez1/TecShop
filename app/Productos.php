<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
	
    protected $fillable = [
        'name', 'descripcion', 'descripcion2', 'imagen', 'imagen2', 'precio', 'categoria', 'marca', 'calificacion',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
