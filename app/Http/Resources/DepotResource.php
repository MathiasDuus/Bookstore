<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepotResource extends JsonResource
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
            'type'=>'Depot',
            'attributes'=>[
                'amount'=>$this->amount,
                'book'=>new BookResource($this->book),
                'store'=> new StoreResource($this->store),
            ]
        ];
    }
}
