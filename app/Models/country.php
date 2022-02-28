<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

    protected $fillable = [
        'abbreviation',
        'name',
    ];

    public $timestamps = false;
    protected $primaryKey = "abbreviation";
    public $incrementing = false;
    protected $keyType = "string";

    public function postal()
    {
        return $this->belongsTo(postal::class, "abbreviation", "country_id");
    }

}
