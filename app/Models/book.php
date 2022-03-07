<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'publisher_id',
        'price',
        'release_date',
        'pages',
        'cover',
    ];

    public function author()
    {
        return $this->hasOne(author::class, "id", "author_id");
    }

    public function publisher()
    {
        return $this->hasOne(publisher::class, "id", "publisher_id");
    }

    public function bookGenre()
    {
        return $this->hasManyThrough(
            '\App\Models\genre',
            '\App\Models\BookGenre',
            'book_id',
            'id',
            'id',
            'genre_id'
        );
    }

    public function depot()
    {
        return $this->belongsTo(depot::class,"id", "book_id");
    }

    public function orderLine()
    {
        return $this->belongsTo(OrderLine::class,"id","book_id");
    }

}
