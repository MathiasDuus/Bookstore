<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'type'=>'Employee',
            'attributes'=>[
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'mail'=>$this->mail,
                'department'=> $this->department->name,
                'store'=> $this->store->name,
            ]
        ];
    }
}
