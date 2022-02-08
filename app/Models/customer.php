<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'mail',
        'password',
        'active'
    ];

    public function address()
    {
        return $this->hasOne(address::class,"id","address_id");
    }

}
