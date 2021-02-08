<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/login-dealer",
     * summary="Login dealers",
     * description="Login con email y contraseña para los repartidores",
     * operationId="authLoginDealer",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Ponga sus credenciales",
     *    @OA\JsonContent(
     *       required={"login","password"},
     *       @OA\Property(property="login", type="string", format="email", example="info@sneak.com"),
     *       @OA\Property(property="password", type="string", format="password", example="12345678"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Credenciales incorrectas")
     *        )
     *     )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="token", type="string")
     *     )
     * )
     */
    public function loginDealer(Request $request)
    {
        $usuario = User::where('email', $request->login)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }
        else {
            if ($usuario->type_user === 2 || $usuario->type_user === 3) {
                return response()->json([
                    'token' => $usuario->createToken($usuario->email)->plainTextToken,
                    'id' => $usuario->id,
                    'name' => $usuario->name,
                    'surname' => $usuario->surname,
                    'email' => $usuario->email,
                    'photo' => $usuario->photo
                ]);
            }
            return response()->json(['error' => 'Este usuario no es Dealer'], 401);
        }
    }

    /**
     * @OA\Post(
     * path="/api/login-customer",
     * summary="Login customers",
     * description="Login con email y contraseña para los clientes",
     * operationId="authLoginCustomer",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Ponga sus credenciales",
     *    @OA\JsonContent(
     *       required={"login","password"},
     *       @OA\Property(property="login", type="string", format="email", example="josejuan@alcoyano.com"),
     *       @OA\Property(property="password", type="string", format="password", example="12345678"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Credenciales incorrectas")
     *        )
     *     )
     * )
     */
    public function loginCustomer(Request $request)
    {
        $usuario = User::where('email', $request->login)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }
        else {
            if ($usuario->type_user === 1 || $usuario->type_user === 3) {
                return response()->json([
                    'token' => $usuario->createToken($usuario->email)->plainTextToken,
                    'id' => $usuario->id,
                    'name' => $usuario->name,
                    'surname' => $usuario->surname,
                    'email' => $usuario->email,
                    'address' => $usuario->address,
                    'created_at' => date("d/m/Y", strtotime($usuario->created_at)),
                    'photo' => $usuario->photo
                ]);
            }
            return response()->json(['error' => 'Este usuario no es Customer'], 401);
        }
    }
}
