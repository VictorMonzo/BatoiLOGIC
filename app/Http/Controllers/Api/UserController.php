<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/api/user-api",
     *      operationId="createdUser",
     *      tags={"Users"},
     *      summary="Crear nuevo user",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Datos para crear usuario",
     *         @OA\JsonContent(
     *              required={"name", "surname", "email", "address", "password"},
     *              @OA\Property(property="name", type="string", example="Victor"),
     *              @OA\Property(property="surname", type="string", example="Monzo Mora"),
     *              @OA\Property(property="email", type="string", example="victor.monzo.mora2@gmail.com"),
     *              @OA\Property(property="address", type="string", example="C/ Correos"),
     *              @OA\Property(property="password", type="string", example="12345678"),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->type_user = 1;
        $user->remember_token = bin2hex(openssl_random_pseudo_bytes(32));
        $user->photo = "/imgs/products-users/DB/DB-userAdam.png";
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *      path="/api/user-api/3",
     *      operationId="editUser",
     *      tags={"Users"},
     *      summary="Editar user",
     *      description="Returns user data",
     *      security={ {"apiAuth": {} }},
     *      @OA\RequestBody(
     *         required=true,
     *         description="Ponga sus credenciales",
     *         @OA\JsonContent(
     *              required={"name", "surname", "address"},
     *              @OA\Property(property="name", type="string", example="Victor"),
     *              @OA\Property(property="surname", type="string", example="Monzo Mora"),
     *              @OA\Property(property="address", type="string", example="C/ Correos"),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *           @OA\JsonContent(
     *              @OA\Property(
     *                  property="error",
     *                  type="string",
     *                  example="Usuario no autenticado"))
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->address = $request->address;
        $user->save();
        return response()->json(UserResource::make($user), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
