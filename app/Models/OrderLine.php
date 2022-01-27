<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = [
        "order_id",
        "book_id",
        "quantity",
        "price"
    ];

    public function order()
    {
        return $this->hasOne(order::class,"id", "order_id");
    }

    public function book()
    {
        return $this->hasOne(book::class, "id","book_id");
    }

    use HasFactory;
}
