<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Product;

class ProviderController extends Controller
{

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
        $productos = Product::where('provider_id', '=', $id)->get();
        //hacer un filter para no mostrar productos inactivos
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
        return redirect()->route('provider.index');
    }

    public function destroy($id)
    {
        Provider::findOrFail($id)->delete();
        return redirect()->route('provider.index');
    }
}
