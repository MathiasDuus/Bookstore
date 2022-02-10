<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(employee::class,"department_id", "id");
    }

    use HasFactory;
}
