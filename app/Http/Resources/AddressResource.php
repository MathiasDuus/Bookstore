<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'type'=>'Address',
            'attributes'=>[
                'street'=>$this->street,
                'postal'=>[
                    'id'=>$this->postal->id,
                    'post_code'=>$this->postal->post_code,
                    'city'=>$this->postal->city,
                    'country'=>$this->postal->country->name,
                ],
                'customer'=> [
                    'id'=>$this->customer->id,
                    'first_name'=>$this->customer->first_name,
                    'last_name'=>$this->customer->last_name,
                    'mail'=>$this->customer->mail,
                    'active'=>(bool)$this->customer->active,
                ],
            ]
        ];
    }
}