<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Product;

class ProviderController extends Controller
{

    public function __construct()
    {
        // Customer
        $this->middleware(['auth', 'typeUser:2'], ['except' => ['index', 'show']]);

        // Dealer
        $this->middleware(['auth', 'typeUser:1'], ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $providers = Provider::orderBy('name', 'ASC')->paginate(6);
        return view('provider.index', compact('providers'));
    }

    public function create()
    {
        return view('provider/create');
    }

    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name = $request->get('name');
        $provider->email = $request->get('email');
        $provider->save();
        return redirect()->route('provider.index');
    }

    public function show($id)
    {
        $provider = Provider::where('id', '=', $id)->get();
        $productos = Product::where('provider_id', '=', $id)->paginate(6);
        return view('provider.show', compact('provider', 'productos'));

    }

    public function edit($id)
    {
        $provider = Provider::where('id', $id)->get();
        return view('provider/edit', compact('provider'));
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::where('id', $id)->get()->first();
        $provider->name = $request->get('name');
        $provider->email = $request->get('email');
        $provider->save();
        return redirect()->route('provider.show', $id);
    }

    public function destroy($id)
    {
        // Borrar products y sus imágenes
        $products = Product::select()->where('provider_id', $id)->get();
        foreach ($products as $product) {
            $pos = strpos($product->photo, '/P-') + 1;
            $photoName = substr($product->photo, $pos);
            \Storage::delete($photoName);

            // Borrar orderLines
            $orderLines = OrderLine::select()->where('product_id', $product->id)->get();
            foreach ($orderLines as $orderLine) {
                // Borrar orders
                Order::where('id', $orderLine->order_id)->delete();
            }
            OrderLine::where('product_id', $product->id)->delete();
        }
        Product::where('provider_id', $id)->delete();

        // Borrar proveedor
        Provider::findOrFail($id)->delete();
        return redirect()->route('provider.index');
    }
}
