<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(book::class, "id","publisher_id");
    }
}
