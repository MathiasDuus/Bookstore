<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worker extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "mail",
        "store_id",
        "department_id",
    ];

    public function store()
    {
        return $this->hasOne(store::class, "id","store_id");
    }

    public function department()
    {
        return $this->hasOne(department::class, "id","department_id");
    }


    use HasFactory;
}
