<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable = [
        'abbreviation',
        'name',
    ];
    public $timestamps = false;

    public function postal()
    {
        return $this->belongsTo(postal::class, "country_id", "abbreviation");
        /*
           return $this->belongsToMany(postal::class)
            ->as('country_id')
            ->withTimestamps();
        */
    }

    protected $primaryKey = "abbreviation";
    public $incrementing = false;
    protected $keyType = "string";

    use HasFactory;
}
