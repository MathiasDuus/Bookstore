<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable = [
        'abbreviation',
        'country',
    ];
    public $timestamps = false;

    public function postal()
    {
        return $this->belongsTo(postal::class, "country_id", "abbreviation");
    }

    protected $primaryKey = "abbreviation";
    public $incrementing = false;
    protected $keyType = "string";
    use HasFactory;
}
