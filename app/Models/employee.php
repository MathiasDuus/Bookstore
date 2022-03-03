<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "password",
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
}
