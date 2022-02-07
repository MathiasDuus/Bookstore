<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    protected $hidden=[
      'laravel_through_key'
    ];

    public function bookGenre()
    {
        return $this->belongsTo(BookGenre::class, "genre_id", "id");
    }


    use HasFactory;
}
