<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depot extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'amount',
        'store_id'
    ];
    public $timestamps = false;

    public function book()
    {
        return $this->hasOne(book::class, "id", "book_id");
    }

    public function store()
    {
        return $this->hasOne(store::class, "id", "store_id");
    }
}
