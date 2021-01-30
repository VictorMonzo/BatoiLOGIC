<?php

namespace App\Http\Resources;

use App\Models\OrderLine;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $orderLine = OrderLine::find($this->id);
        $product = Product::find($orderLine['product_id']);
        $nameProduct = $product['name'];

        return [
            'id' => $this->id,
            'state_id' => $this->state,
            'state' => $this->states->name,
            'address' => $this->address,
            'created_at' => date("d/m/Y", strtotime($this->created_at)),
            'updated_at' => date("d/m/Y", strtotime($this->updated_at)),
            'userName' => $this->users->name,

            'productName' => $nameProduct,
            'orderLine' => OrderLine::find($this->id)
        ];
    }
}
