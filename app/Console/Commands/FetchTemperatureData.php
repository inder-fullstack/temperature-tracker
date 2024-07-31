<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\City;
use App\Models\TemperatureRecord;
use Carbon\Carbon;

class FetchTemperatureData extends Command
{
    protected $signature = 'temperature:fetch';
    protected $description = 'Fetch temperature data for Palma from Open-Meteo API';

    public function handle()
    {
        $city = City::firstOrCreate(
            ['name' => 'Palma', 'country' => 'Spain'],
            ['latitude' => 39.5696, 'longitude' => 2.6502]
        );

        $client = new Client();
        $response = $client->get(env('API_BASE_PATH'), [
            'query' => [
                'latitude' => $city->latitude,
                'longitude' => $city->longitude,
                'hourly' => 'temperature_2m',
                'forecast_days' => 1,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        $temperatures = $data['hourly']['temperature_2m'];
        $times = $data['hourly']['time'];

        foreach ($times as $index => $time) {
            TemperatureRecord::updateOrCreate(
                [
                    'city_id' => $city->id,
                    'recorded_at' => Carbon::parse($time),
                ],
                ['temperature' => $temperatures[$index]]
            );
        }

        $this->info('Temperature data fetched and stored successfully.');
    }
}
