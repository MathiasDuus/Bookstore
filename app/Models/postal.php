<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postal extends Model
{
    protected $fillable = [
        'post_code',
        'country_id',
        'city'
    ];

    public function country()
    {
        return $this->hasOne(country::class, "abbreviation", "country_id");
    }

    public function address()
    {
        return $this->belongsTo(address::class, "postal_id","id");
    }

    use HasFactory;
}
