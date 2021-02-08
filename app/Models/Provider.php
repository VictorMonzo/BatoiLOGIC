<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, name, email"},
 * @OA\Xml(name="State"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="true", example="Nike"),
 * @OA\Property(property="email", type="string", readOnly="true", example="info@nike.com"),
 * )
 *
 * Class Provider
 *
 */

class Provider extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Products
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
