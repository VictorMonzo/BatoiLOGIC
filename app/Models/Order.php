<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, state_id, state, address, created_at, updated_at, userName, productName, OrderLine"},
 * @OA\Xml(name="Order"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="state_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="state", type="string", readOnly="true", example="En espera"),
 * @OA\Property(property="address", type="string", readOnly="true", example="C/ Correos"),
 * @OA\Property(property="created_at", type="string", readOnly="true", example="11/11/11"),
 * @OA\Property(property="updated_at", type="string", readOnly="true", example="12/12/12"),
 * @OA\Property(property="userName", type="string", readOnly="true", example="Víctor"),
 * @OA\Property(property="productName", type="string", readOnly="true", example="Zapatillas Nike"),
 * @OA\Property(property="OrderLine", type="object", readOnly="true", example="{ 'id':1, 'quantity':10, 'price':80, 'discount':0, 'order_id':1, 'user_id':1, 'product_id':7 }"),
 * )
 *
 * Class Order
 *
 */

class Order extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Users
    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function dealers() {
        return $this->belongsTo('App\Models\User', 'dealer_id');
    }

    public function states() {
        return $this->belongsTo('App\Models\State', 'state');
    }

    // Crear relación Uno a muchos con la tabla OrderLines
    public function order_lines() {
        return $this->hasMany('App\Models\OrderLine');
    }

}
