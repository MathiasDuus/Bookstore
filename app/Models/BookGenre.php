<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'genre_id'
    ];

    public $timestamps = false;

    public function book()
    {
        return $this->hasOne(book::class, "id", "book_id");
    }

    public function genre()
    {
        return $this->hasOne(genre::class, "id", "genre_id");
    }
}
