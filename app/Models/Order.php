<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Crear relación Uno a muchos con la tabla Users
    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Crear relación Uno a muchos con la tabla OrderLines
    public function order_lines() {
        return $this->hasMany('App\Models\OrderLine');
    }
}
