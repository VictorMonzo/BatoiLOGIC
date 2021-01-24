<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
