<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $fillable = [
        "address_id",
        "name"
    ];

    public function address()
    {
        return $this->hasOne(address::class,"id", "address_id");
    }


    public function depot()
    {
        return $this->belongsTo(depot::class, "id","store_id");
    }

    public function employee()
    {
        return $this->belongsTo(employee::class, "id","store_id");
    }
}
