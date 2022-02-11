<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function GuzzleHttp\Promise\all;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //TODO: gør så amn kan se alle brugerens ordre og addresser
        return [
            'id'=>(string)$this->id,
            'type'=>'Customer',
            'attributes'=>[
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'mail'=>$this->mail,
                'password'=>$this->password,
                'active'=>$this->active,
                'address' => $this->address,
                'orders' => OrderResource::collection($this->address->order->all()), // Not work but almost
            ]
        ];
    }
}
