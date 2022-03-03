<?php

namespace App\Http\Resources;

use App\Models\address;
use App\Models\order;
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
        $order=[];
        foreach (address::where('customer_id',$this->id)->get('id') as $id) {
            $temp = OrderResource::collection(order::where('address_id', $id['id'])->get());

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
                'email' => $this->email,
                'active' => (bool) $this->active,
                'addresses' => AddressResource::collection(address::where('customer_id',$this->id)->get()),
                'orders' => $order,
            ]
        ];
    }
}
