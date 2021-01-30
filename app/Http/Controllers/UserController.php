<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'], ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate(6);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_users = TypeUser::all();
        return view('user/create', compact('type_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardamos la imagen
        $file = $request->file('photo');
        $nombre =  "U-".$file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $user = new User();
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->type_user = $request->get('type_user');
        $user->password = Hash::make($request->get('password'));
        $user->photo = '/imgs/products-users/'.$nombre;
        $user->remember_token = bin2hex(openssl_random_pseudo_bytes(32));
        $user->save();

        if ($request->get('type_register')) return redirect()->route('user.index');
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->id === intval($id) || auth()->user()->type_user === 3) {
            $user = User::where('id', '=', $id)->get();
            if ($user[0]->type_user === 2) {
                $orders = Order::where('dealer_id', '=', $id)->where('state', '=', 3)->paginate(6);
            } else {
                $orders = Order::where('user_id', '=', $id)->paginate(6);
            }
            return view('user.show', compact('user', 'orders'));
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id === intval($id) || auth()->user()->type_user === 3) {
            $user = User::where('id', $id)->get();
            $type_users = TypeUser::all();
            return view('user/edit', compact('user', 'type_users'));
        }
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->id === intval($id) || auth()->user()->type_user === 3) {
            $user = User::where('id', $id)->get()->first();

            if ($request->has('photo')) {
                $photoURL = User::select('photo')->where('id', $id)->first();
                $pos = strpos($photoURL->photo, '/U-') + 1;
                $photoName = substr($photoURL->photo, $pos);
                \Storage::delete($photoName);

                // Guardamos la imagen
                $file = $request->file('photo');
                $nombre =  "U-".$file->getClientOriginalName();
                \Storage::disk('local')->put($nombre,  \File::get($file));

                $user->photo = '/imgs/products-users/'.$nombre;
            }

            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->email = $request->get('email');
            $user->address = $request->get('address');
            $user->type_user = $request->get('type_user');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            return redirect()->route('user.show', $id);
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id === intval($id) || auth()->user()->type_user === 3) {
            $photoURL = User::select('photo')->where('id', $id)->first();
            $pos = strpos($photoURL->photo, '/U-') + 1;
            $photoName = substr($photoURL->photo, $pos);
            \Storage::delete($photoName);

            $orderLines = OrderLine::select()->where('user_id', $id)->get();
            foreach ($orderLines as $orderLine) {
                // Borrar orders
                Order::where('id', $orderLine->order_id)->delete();
            }
            OrderLine::where('user_id', $id)->delete();

            User::findOrFail($id)->delete();
            return redirect()->route('user.index');
        }
        return redirect()->route('home');
    }
}
