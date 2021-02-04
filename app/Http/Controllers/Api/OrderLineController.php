<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrderLineController extends Controller
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
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLine $orderLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *      path="/api/order-line/1",
     *      operationId="updateOrderLine",
     *      tags={"OrderLines"},
     *      summary="Editar orden-line",
     *      description="Returns order data",
     *      security={ {"apiAuth": {} }},
     *      @OA\RequestBody(
     *         required=true,
     *         description="Ponga sus credenciales",
     *         @OA\JsonContent(
     *              required={"quantity"},
     *              @OA\Property(property="quantity", type="integer", example="10"),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OrderLine")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *           @OA\JsonContent(
     *              @OA\Property(
     *                  property="error",
     *                  type="string",
     *                  example="Usuario no autenticado"))
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function update(Request $request, OrderLine $orderLine)
    {
        $orderLine->quantity = $request->quantity;
        $orderLine->save();
        return response()->json($orderLine,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLine $orderLine)
    {
        //
    }
}
