<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country', 'latitude', 'longitude'];

    public function temperatureRecords()
    {
        return $this->hasMany(TemperatureRecord::class);
    }
}
