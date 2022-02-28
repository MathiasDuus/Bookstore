<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_id',
        'street',
        'customer_id'
    ];

    // TODO: rework all keys, in all models
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
        return $this->belongsTo(order::class,"id", "address_id");
    }

    public function store()
    {
        return $this->belongsTo(store::class, "id", "address_id");
    }

}
