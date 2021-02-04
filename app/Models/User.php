<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 * @OA\Schema(
 * required={"token, id, name, surname, email, address, created_at, photo"},
 * @OA\Xml(name="User"),
 * @OA\Property(property="token", type="string", readOnly="true", example="12 |afafafdeavafafr"),
 * @OA\Property(property="name", type="string", readOnly="true", example="Victor"),
 * @OA\Property(property="surname", type="string", readOnly="true", example="Monzo Mora"),
 * @OA\Property(property="email", type="string", readOnly="true", example="victor.monzo.mora@gmail.com"),
 * @OA\Property(property="address", type="string", readOnly="true", example="C/ Correos"),
 * @OA\Property(property="created_at", type="string", readOnly="true", example="11/11/11"),
 * @OA\Property(property="photo", type="string", readOnly="true", example="/imgs/products-users/DB/U-victor.jpg"),
 * )
 *
 * Class User
 *
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Crear relación Uno a muchos con la tabla Order
    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function type_users() {
        return $this->belongsTo('App\Models\TypeUser', 'type_user');
    }


}
