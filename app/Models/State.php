<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id, name"},
 * @OA\Xml(name="State"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="true", example="En espera"),
 * )
 *
 * Class State
 *
 */

class State extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
}
