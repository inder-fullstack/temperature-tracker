<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureRecord extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'recorded_at', 'temperature'];

    protected $casts = [
        'recorded_at' => 'datetime',
        'temperature' => 'float',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
