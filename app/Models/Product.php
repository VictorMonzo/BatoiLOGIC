<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, name", "description", "price", "stock", "photo", "created_at", "updated_at", "provider_id", "nameProvider", "categorie_id"},
 * @OA\Xml(name="Product"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="true", example="Nike Air Force 1"),
 * @OA\Property(property="description", type="string", readOnly="true", example="Las clásicas Air Force 1, ahora con un toque diferente. Estas zapatillas AF1..."),
 * @OA\Property(property="price", type="integer", readOnly="true", example="110"),
 * @OA\Property(property="stock", type="integer", readOnly="true", example="200"),
 * @OA\Property(property="photo", type="string", readOnly="true", example="/imgs/products-users/DB/DB-prodNike1.jpg"),
 * @OA\Property(property="created_at", type="string", readOnly="true", example="17/01/2021"),
 * @OA\Property(property="updated_at", type="string", readOnly="true", example="17/01/2021"),
 * @OA\Property(property="nameProvider", type="string", readOnly="true", example="Nike"),
 * @OA\Property(property="categorie_id", type="integer", readOnly="true", example="1"),
 * )
 *
 * Class Product
 *
 */

class Product extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla OrderLines
    public function orders() {
        return $this->hasMany('App\Models\Product');
    }

    // Crear relación Uno a muchos con la tabla Providers
    public function providers() {
        return $this->belongsTo('App\Models\Provider', 'provider_id');
    }

    public function categories() {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id');
    }
}
