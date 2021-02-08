<?php

namespace App\Http\Resources;

use App\Models\OrderLine;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'state_id' => $this->state,
            'address' => $this->address,
            'created_at' => date("d/m/Y", strtotime($this->created_at)),
            'updated_at' => date("d/m/Y", strtotime($this->updated_at)),
            'userName' => $this->users->name,

            'orderLine' => OrderLine::find($this->id)
        ];
    }
}
