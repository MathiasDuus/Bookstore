<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'
    ];
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(book::class, "author_id","id");
    }

    use HasFactory;
}
