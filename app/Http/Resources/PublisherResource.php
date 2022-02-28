<?php

namespace App\Http\Resources;

use App\Models\book;
use Illuminate\Http\Resources\Json\JsonResource;

class PublisherResource extends JsonResource
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
            'type'=>'Publisher',
            'attributes'=>[
                'name'=>$this->name
            ],
            'book' => BookResource::collection(book::where('publisher_id', $this->id)->get()),
        ];
    }
}
