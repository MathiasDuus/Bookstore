<?php

namespace App\Http\Resources;

use App\Models\depot;
use App\Models\employee;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'type'=>'Store',
            'attributes'=>[
                'name'=>$this->name,
                'address'=> [
                    'street' => $this->address->street,
                    'postal' => [
                        'id' => (string)$this->address->postal->id,
                        'post_code' => $this->address->postal->post_code,
                        'city' => $this->address->postal->city,
                        'country' => $this->address->postal->country->name,
                    ],
                ],
                'employee' => EmployeeResource::collection(employee::where('store_id',$this->id)->get()),
                'depot' => DepotResource::collection(depot::where('store_id',$this->id)->get()),
            ]
        ];
    }
}
