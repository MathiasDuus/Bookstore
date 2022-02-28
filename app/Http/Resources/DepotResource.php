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
                'store'=>[
                    'id'=>(string)$this->store->id,
                    'name'=>$this->store->name,
                    'address'=> [
                        'street' => $this->store->address->street,
                        'postal' => [
                            'id' => (string)$this->store->address->postal->id,
                            'post_code' => $this->store->address->postal->post_code,
                            'city' => $this->store->address->postal->city,
                            'country' => $this->store->address->postal->country->name,
                        ],
                    ],
                ],
            ]
        ];
    }
}
