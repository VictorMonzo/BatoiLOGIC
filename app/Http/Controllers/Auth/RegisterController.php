<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new user as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect user after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Guardamos la imagen
        //$file = $request->file('photo');
        //$nombre =  "P-".$file->getClientOriginalName();
        //\Storage::disk('local')->put($nombre,  \File::get($file));

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->surname = $data['surname'];
        $user->address = $data['address'];
        $user->rol = 0;
        $user->type_user = 0;
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('home');
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'surname' => $data['surname'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);*/
    }
}
