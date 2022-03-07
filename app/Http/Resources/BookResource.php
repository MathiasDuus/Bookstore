<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'type'=>'Book',
            'attributes'=>[
                'name'=>$this->name,
                'release_date'=>date('d-m-Y',strtotime($this->release_date)),
                'price'=>$this->price,
                'pages'=>$this->pages,
                'cover'=>$this->cover,
                'publisher'=> $this->publisher->name,
                'author'=> $this->author->name,
                'genre'=>$this->BookGenre,
            ]
        ];
    }
}
