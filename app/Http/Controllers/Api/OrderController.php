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


    /**
     * @OA\Get(
     *      path="/api/order-dealer/1",
     *      operationId="getOrdersByIdDealer",
     *      tags={"Orders"},
     *      summary="Obtiene orders del dealer para repartir",
     *      description="Obtiene las ordenes a repartir de dealer",
     *      security={ {"apiAuth": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function indexbyIdDealer($id) {
        $orders = Order::where('dealer_id', '=', $id)->where('state', '!=', 3)->get();
        //return response()->json(OrderResource::collection($orders), 201);
        return response()->json(OrderResource::collection($orders), 200);
    }

    /**
     * @OA\Get(
     *      path="/api/order-customer/1",
     *      operationId="getOrdersByIdCustomer",
     *      tags={"Orders"},
     *      summary="Obtiene orders del customer sin entregar",
     *      description="Obtiene las ordenes del customer que no se han repartido todavía",
     *      security={ {"apiAuth": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function indexByIdCustomer($id) {
        $orders = Order::where('user_id', '=', $id)->where('state', '!=', 3)->get();
        return response()->json(OrderResource::collection($orders), 200);
    }

    /**
     * @OA\Get(
     *      path="/api/order-customer-all/1",
     *      operationId="getAllOrdersByIdCustomer",
     *      tags={"Orders"},
     *      summary="Obtiene totas las orders del customer",
     *      description="Obtiene todas las ordenes del customer",
     *      security={ {"apiAuth": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function indexByIdCustomerAll($id) {
        $orders = Order::where('user_id', '=', $id)->get();
        return response()->json(OrderResource::collection($orders), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/api/order-api",
     *      operationId="createdOrder",
     *      tags={"Orders"},
     *      summary="Crear nueva orden",
     *      description="Returns order data",
     *      security={ {"apiAuth": {} }},
     *      @OA\RequestBody(
     *         required=true,
     *         description="Ponga sus credenciales",
     *         @OA\JsonContent(
     *              required={"address", "user_id", "quantity", "price", "product_id"},
     *              @OA\Property(property="address", type="string", example="C/ Correos"),
     *              @OA\Property(property="user_id", type="integer", example="1"),
     *              @OA\Property(property="quantity", type="integer", example="15"),
     *              @OA\Property(property="price", type="integer", example="99"),
     *              @OA\Property(property="product_id", type="integer", example="5"),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Order")
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

    /**
     * @OA\Put(
     *      path="/api/order-api/1",
     *      operationId="updateOrder",
     *      tags={"Orders"},
     *      summary="Editar orden",
     *      description="Returns order data",
     *      security={ {"apiAuth": {} }},
     *      @OA\RequestBody(
     *         required=true,
     *         description="Ponga sus credenciales",
     *         @OA\JsonContent(
     *              required={"state_id"},
     *              @OA\Property(property="state_id", type="integer", example="2"),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Order")
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
    public function update(Request $request, Order $order)
    {
        $order->state = $request->state_id;

        /*$order->address = $request->address;
        $order->user_id = $request->user_id;
        $order->dealer_id = $request->dealer_id;*/

        $order->save();
        return response()->json(OrderUpdateResource::make($order), 201);
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
