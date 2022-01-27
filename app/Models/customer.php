<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'mail',
        'password',
        'active'
    ];

    public function address()
    {
        return $this->belongsTo(address::class,"customer_id","id");
    }

    use HasFactory;
}
