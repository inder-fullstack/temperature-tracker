<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\TemperatureRecord;
use Illuminate\Support\Collection;

class TemperatureRepository
{
    public function getCityByName(string $name): ?City
    {
        return City::where('name', $name)->first();
    }

    public function getTemperaturesByCityId(int $cityId): Collection
    {
        return TemperatureRecord::where('city_id', $cityId)
            ->orderBy('recorded_at')
            ->get()
            ->map(function ($record) {
                return [
                    'x' => $record->recorded_at->format('Y-m-d H:i:s'),
                    'y' => $record->temperature,
                ];
            });
    }
}
