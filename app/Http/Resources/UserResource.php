<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $request->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => date("d/m/Y", strtotime($request->created_at)),
            'photo' => $request->photo
        ];
    }
}
