<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'], ['except' => []]);

        // Customer
        $this->middleware(['auth', 'typeUser:2'], ['except' => ['index', 'show', 'create', 'store', 'createIdProduct']]);

        // Dealer
        $this->middleware(['auth', 'typeUser:1'], ['except' => ['index', 'show', 'edit', 'update', 'pdf']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->type_user === 1) { $orders = Order::where('user_id', '=', auth()->user()->id)->where('state', '!=', 3)->orderBy('created_at', 'ASC')->paginate(6); }
            elseif (auth()->user()->type_user === 2) { $orders = Order::where('dealer_id', '=', auth()->user()->id)->where('state', '!=', 3)->orderBy('created_at', 'ASC')->paginate(6); }
            else { $orders = Order::where('dealer_id', '!=', 0)->orderBy('created_at', 'ASC')->paginate(6); }
        } else {
            $orders = Order::paginate(6);
        }
        $noDealer = false;
        return view('order.index', compact('orders', 'noDealer'));
    }

    public function noDealer() {
        $orders = Order::where('dealer_id', '=', 0)->orderBy('created_at', 'ASC')->paginate(6);
        $noDealer = true;
        return view('order.index', compact('orders', 'noDealer'));
    }

    public function pdf($id) {
        $orders  = Order::where('dealer_id', '=', auth()->user()->id)->where('state', '!=', 3)->orderBy('created_at', 'ASC')->get();

        $orderLines = [];
        foreach ($orders as $order) {
            array_push($orderLines, OrderLine::where('order_id', $order->id)->first());
        }

        $count = 0;

        $pdf = PDF::loadView('order.pdf', compact('orders', 'orderLines', 'count'));
        return $pdf->download('albaran-'.auth()->user()->name.'.pdf');
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

    public function createIdProduct($idProduct) {
        $products = Product::where('active', '=', 1)->where('stock', '!=', 0)->get();
        $productSelectedName = Product::select('name')->where('id', '=', $idProduct)->first();
        return view('order/create', compact('products', 'idProduct', 'productSelectedName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dealers = User::select('id')->where('type_user', '=', 2)->get();

        $order = new Order();
        $order->state = 1;
        $order->address = $request->get('address');
        $order->user_id = $request->get('user_id');
        $order->dealer_id = $dealers[random_int(0, count($dealers)-1)]->id;
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
        if (auth()->user()->id === $order[0]->user_id || auth()->user()->id === $order[0]->dealer_id || auth()->user()->type_user === 3) {
            $orderLines = OrderLine::where('order_id', '=', $id)->paginate(6);;
            return view('order.show', compact('order', 'orderLines'));
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
