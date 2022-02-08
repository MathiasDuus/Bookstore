<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderLineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>(string)$this->id,
            'type'=>'OrderLine',
            'attributes'=>[
                'quantity'=>$this->quantity,
                'price'=>$this->price,
                'order'=> new OrderResource($this->order),
                'book'=> new BookResource($this->book),
            ]
        ];
    }
}
