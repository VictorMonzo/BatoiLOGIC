<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{

    public function __construct()
    {
        // Si es Dealear (cliente)
        //$this->middleware(['auth', 'typeUser:1'], ['except' => ['index', 'show', 'create', 'store']]);

        // Si es Customer (repartidor)
        //$this->middleware(['auth', 'typeUser:2'], ['except' => ['index', 'show', 'edit', 'update']]);

        // Si es Administrador
        //$this->middleware(['auth', 'typeUser:3'], ['except' => ['index', 'show', 'create', 'store', 'edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type_user === 1) { $orders = Order::where('user_id', '=', auth()->user()->id)->where('state', '!=', 3)->orderBy('created_at', 'ASC')->paginate(6); }
        elseif (auth()->user()->type_user === 2) { $orders = Order::where('dealer_id', '=', auth()->user()->id)->where('state', '!=', 3)->orderBy('created_at', 'ASC')->paginate(6); }
        else { $orders = Order::where('dealer_id', '!=', 0)->orderBy('created_at', 'ASC')->paginate(6); }
        return view('order.index', compact('orders'));
    }

    public function noDealer() {
        $orders = Order::where('dealer_id', '=', 0)->orderBy('created_at', 'ASC')->paginate(6);
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('active', '=', 1)->where('stock', '!=', 0)->get();
        return view('order/create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->state = 1;
        $order->address = $request->get('address');
        $order->user_id = $request->get('user_id');
        $order->dealer_id = 0;
        $order->save();

        $orderLine = new OrderLine();
        $orderLine->quantity = $request->get('quantity');
        $orderLine->price = Product::where('id', '=', $request->get('product_id'))->first()->value('price');
        $orderLine->order_id = $order->id;
        $orderLine->discount = 0;
        $orderLine->user_id = $request->get('user_id');
        $orderLine->product_id = $request->get('product_id');
        $orderLine->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', '=', $id)->get();
        $orderLines = OrderLine::where('order_id', '=', $id)->paginate(6);;
        return view('order.show', compact('order', 'orderLines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->get();
        $dealers = User::where('type_user', 2)->get();
        $states = State::all();
        return view('order/edit', compact('order', 'dealers', 'states'));
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
        $order = Order::where('id', $id)->get()->first();
        $order->state = $request->get('state');
        $order->dealer_id = $request->get('dealer_id');
        $order->save();
        return redirect()->route('order.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderLine::where('order_id', $id)->delete();
        Order::findOrFail($id)->delete();
        return redirect()->route('order.index');
    }
}
