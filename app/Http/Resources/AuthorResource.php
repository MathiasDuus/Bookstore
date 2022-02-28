<?php

namespace App\Http\Resources;

use App\Models\book;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'type'=>'Author',
            'attributes'=>[
                'name'=>$this->name
            ],
            'book' => BookResource::collection(book::where('author_id', $this->id)->get()),
        ];
    }
}
