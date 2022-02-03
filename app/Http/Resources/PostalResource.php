<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostalResource extends JsonResource
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
            'type'=>'Postal',
            'attributes'=>[
                'post_code'=>$this->post_code,
                'city'=>$this->city,
                'country_id'=>$this->country_id,
                'country'=> $this->country->name,
            ]
        ];
    }
}
