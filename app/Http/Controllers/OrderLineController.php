<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'], ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderLine = OrderLine::where('id', '=', $id)->get();
        return view('orderLine.show', compact( 'orderLine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = OrderLine::select('user_id')->find($id);
        if (auth()->user()->id === $user_id->user_id || auth()->user()->type_user === 3) {
            $orderLine = OrderLine::where('id', $id)->get();
            return view('orderLine/edit', compact('orderLine'));
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
        $user_id = OrderLine::select('user_id')->find($id);
        if (auth()->user()->id === $user_id->user_id || auth()->user()->type_user === 3) {
            $orderLine = OrderLine::where('id', $id)->get()->first();
            $orderLine->quantity = $request->get('quantity');
            $orderLine->save();
            return redirect()->route('order.show', $request->get('order_id'));
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
        //
    }
}
