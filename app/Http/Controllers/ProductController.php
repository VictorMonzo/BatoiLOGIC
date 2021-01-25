<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Customer
        $this->middleware(['auth', 'typeUser:2'], ['except' => ['index', 'show']]);

        // Dealer
        $this->middleware(['auth', 'typeUser:1'], ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('active', '=', 1)->where('stock', '!=', 0)->orderBy('name', 'ASC')->paginate(6);;
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();
        return view('product/create', compact('providers'));
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
        $nombre =  "P-".$file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->active = $request->get('active') ? 1 : 0;
        $product->photo = '/imgs/products-users/'.$nombre;
        $product->provider_id = $request->get('provider_id');
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->get();
        $orderLines = OrderLine::where('product_id', '=', $id)->paginate(6);
        return view('product.show', compact('product', 'orderLines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->get();
        $providers = Provider::all();
        return view('product/edit', compact('product', 'providers'));
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
        $product = Product::where('id', $id)->get()->first();

        if ($request->has('photo')) {
            $photoURL = Product::select('photo')->where('id', $id)->first();
            $pos = strpos($photoURL->photo, '/P-') + 1;
            $photoName = substr($photoURL->photo, $pos);
            \Storage::delete($photoName);

            // Guardamos la imagen
            $file = $request->file('photo');
            $nombre =  "P-".$file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));

            $product->photo = '/imgs/products-users/'.$nombre;
        }

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->active = $request->get('active') ? 1 : 0;
        $product->provider_id = $request->get('provider_id');
        $product->save();
        return redirect()->route('product.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photoURL = Product::select('photo')->where('id', $id)->first();
        $pos = strpos($photoURL->photo, '/P-') + 1;
        $photoName = substr($photoURL->photo, $pos);
        \Storage::delete($photoName);

        $orderLines = OrderLine::select()->where('product_id', $id)->get();
        foreach ($orderLines as $orderLine) {
            // Borrar orders
            Order::where('id', $orderLine->order_id)->delete();
        }
        OrderLine::where('product_id', $id)->delete();

        Product::findOrFail($id)->delete();
        return redirect()->route('product.index');
    }
}
