<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, quantity, price, discount, order_id, user_id, product_id"},
 * @OA\Xml(name="OrderLine"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="quantity", type="integer", readOnly="true", example="10"),
 * @OA\Property(property="discount", type="integer", readOnly="true", example="0"),
 * @OA\Property(property="order_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="user_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="product_id", type="integer", readOnly="true", example="1"),
 * )
 *
 * Class State
 *
 */

class OrderLine extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Orders
    public function orders() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    // Crear relación Uno a muchos con la tabla Products
    public function products() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    /**
     * @param $price
     * @param $quantity
     * @param $discount
     * @return float|int
     */
    Static function totalPrice($price, $quantity, $discount) {
        if ($discount) return number_format(($price*$quantity)*($discount/100), 2);
        return number_format($price*$quantity, 2);
    }
}
