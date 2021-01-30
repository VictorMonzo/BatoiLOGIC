<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Products
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
