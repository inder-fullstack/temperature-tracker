<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TemperatureRepository;

class TemperatureController extends Controller
{
    protected $temperatureRepository;

    public function __construct(TemperatureRepository $temperatureRepository)
    {
        $this->temperatureRepository = $temperatureRepository;
    }

    public function index(Request $request)
    {
        $cityName = $request->input('city', 'Palma');
        $city = $this->temperatureRepository->getCityByName($cityName);

        $temperatures = collect();
        if (!is_null($city)) {
            $temperatures = $this->temperatureRepository->getTemperaturesByCityId($city->id);
            \Log::info('Temperature data:', $temperatures->toArray());
        }

        return view('temperature', compact('temperatures', 'city'));
    }
}
