<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getResponseFromApi($zone) {
    
        $apiToken = env('CO2_API_TOKEN');

        if (!$zone || !$apiToken) {
            return "there are missing information";
        }

        $url = "https://api.example.com/co2-emissions?zone={$zone}&token={$apiToken}";

        $response = Http::get($url);

        if ($response->successful()) {
            $carbonIntensity = $response->json()['carbonIntensity'];

            $color = getColorByCarbonIntensity($carbonIntensity);
        
            return view('measure', compact('zone', 'carbonIntensity', 'color'));
            
        } else {
            return 'Failed to fetch data from the API';
        }
    }

    public function getColorByCarbonIntensity($carbonIntensity)
    {
        if ($carbonIntensity > 400) {
            return "RED";
        } elseif ($carbonIntensity < 200) {
            return "GREEN";
        } else {
            return "YELLOW";
        }
    }
    
}
