<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderUpdateResource;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orders = Order::all();
        //return response()->json(OrderResource::collection($orders), 201);
    }

    public function indexbyIdDealer($id) {
        $orders = Order::where('dealer_id', '=', $id)->where('state', '!=', 3)->get();
        //return response()->json(OrderResource::collection($orders), 201);
        return response()->json(OrderResource::collection($orders), 201);
    }

    public function indexByIdCustomer($id) {
        $orders = Order::where('user_id', '=', $id)->where('state', '!=', 3)->get();
        return response()->json(OrderResource::collection($orders), 201);
    }

    public function indexByIdCustomerAll($id) {
        $orders = Order::where('user_id', '=', $id)->get();
        return response()->json(OrderResource::collection($orders), 201);
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
        $order->dealer_id = 0;
        $order->address = $request->address;
        $order->user_id = $request->user_id;
        $order->save();

        $orderLine = new OrderLine();
        $orderLine->quantity = $request->quantity;
        $orderLine->price = $request->price;
        $orderLine->discount = 0;
        $orderLine->order_id = $order->id;
        $orderLine->user_id = $request->user_id;
        $orderLine->product_id = $request->product_id;
        $orderLine->save();

        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //return response()->json(OrderResource::collection($order), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->state = $request->state_id;
        $order->save();
        return response()->json(OrderUpdateResource::make($order), 201);
        //return response()->json($order,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //$order->delete();
        //return response()->json(null, 204);
    }
}
