<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => (string)$this->id,
            'type' => 'Order',
            'attributes' => [
                'customer'=>[
                    'first_name'=>$this->address->customer->first_name,
                    'last_name'=>$this->address->customer->last_name,
                    'mail'=>$this->address->customer->mail,
                ],
                'address' => [
                    'id' => (string)$this->address->id,
                    'street' => $this->address->street,
                    'post_code' => $this->address->postal->post_code,
                    'city' => $this->address->postal->city,
                    'country' => $this->address->postal->country->name,
                ],
                'date' => $this->date,
                'status' => $this->status,
            ]
        ];
    }
}
