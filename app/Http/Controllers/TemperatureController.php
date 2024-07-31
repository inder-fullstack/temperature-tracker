<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\TemperatureRecord;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function index()
    {
        $city = City::where('name', 'Palma')->first();
        $temperatures = TemperatureRecord::where('city_id', $city->id)
            ->orderBy('recorded_at')
            ->get()
            ->map(function ($record) {
                return [
                    'x' => $record->recorded_at->format('Y-m-d H:i:s'),
                    'y' => $record->temperature,
                ];
            });
        // Add this debugging line
        \Log::info('Temperature data:', $temperatures->toArray());

        return view('temperature', compact('temperatures', 'city'));
    }
}
