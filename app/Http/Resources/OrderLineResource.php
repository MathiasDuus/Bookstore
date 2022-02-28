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
            'id' => (string)$this->id,
            'type' => 'OrderLine',
            'attributes' => [
                'quantity' => $this->quantity,
                'price' => $this->price,
                'order' => [
                    'id' => (string)$this->order->id,
                    'date' => date('d-m-Y', strtotime($this->order->date)),
                    'status' => $this->order->status,
                    'customer' => [
                        'id' => (string)$this->order->address->customer->id,
                        'first_name' => $this->order->address->customer->first_name,
                        'last_name' => $this->order->address->customer->last_name,
                        'mail' => $this->order->address->customer->mail,
                    ],
                    'address' => [
                        'id' => (string)$this->order->address->id,
                        'street' => $this->order->address->street,
                        'post_code' => $this->order->address->postal->post_code,
                        'city' => $this->order->address->postal->city,
                        'country' => $this->order->address->postal->country->name,
                    ],
                ],
                'book' => new BookResource($this->book),
            ]
        ];
    }
}
