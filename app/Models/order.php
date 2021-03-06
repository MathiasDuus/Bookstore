<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        "address_id",
        "date",
        "status",
    ];

    public function address()
    {
        return $this->hasOne(address::class, "id", "address_id");
    }

    public function orderLine()
    {
        return $this->belongsTo(OrderLine::class, "id", "order_id");
    }
}
