<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'photo' => $this->photo,
            'created_at' => date("d/m/Y", strtotime($this->created_at)),
            'updated_at' => date("d/m/Y", strtotime($this->updated_at)),
            'provider_id' => $this->provider_id,
            'nameProvider' => $this->providers->name
        ];
    }
}
