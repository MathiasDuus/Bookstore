<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        foreach ($this->address->where('customer_id',$this->id)->get('id') as $id) {
            $temp = OrderResource::collection($this->address->order->where('address_id', $id['id'])->get());

            if ($temp->isNotEmpty()) {
                $order[] = $temp;
            }
        }

        return [
            'id' => (string)$this->id,
            'type' => 'Customer',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'mail' => $this->mail,
                'password' => $this->password,
                'active' => (bool) $this->active,
                'addresses' => AddressResource::collection($this->address->where('customer_id',$this->id)->get()),
                'orders' => $order,
            ]
        ];
    }
}
