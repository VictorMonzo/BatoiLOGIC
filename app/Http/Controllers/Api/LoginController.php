<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
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
