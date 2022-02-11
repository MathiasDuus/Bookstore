<?php

namespace App\Http\Resources;

use App\Http\Requests\GenreRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class BookGenreResource extends JsonResource
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
            'type'=>'Book_Genre',
            'attributes'=>[
                'genre'=> $this->genre->name,
                'book'=> $this->book->name,
            ]
        ];
    }
}
