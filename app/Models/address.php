<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable = [
        'postal_id',
        'street',
        'customer_id'
    ];

    public function postal()
    {
        return $this->hasOne(postal::class, "id", "postal_id");
    }

    public function customer()
    {
        return $this->hasOne(customer::class, "id", "customer_id");
    }

    public function order()
    {
        return $this->belongsTo(order::class,"address_id", "id");
    }

    public function store()
    {
        return $this->belongsTo(store::class, "address_id", "id");
    }

    use HasFactory;
}
