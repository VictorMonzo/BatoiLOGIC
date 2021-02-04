<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, name"},
 * @OA\Xml(name="Categorie"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="true", example="Zapatillas"),
 * )
 *
 * Class State
 *
 */

class Categorie extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Products
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
