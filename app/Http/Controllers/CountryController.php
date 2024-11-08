<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function getResponseFromApi(Request $request) {
    
        $apiToken = env('API_KEY_TOKEN');

        $zone = $request->input('zone');

        $url = "https://api.electricitymap.org/v3/carbon-intensity/latest?zone={$zone}";

        $response = Http::withHeaders([
            'auth-token' => $apiToken,
        ])->get($url);

        if ($response->successful()) {
            $carbonIntensity = $response->json()['carbonIntensity'];

            $color = $this->getColorByCarbonIntensity($carbonIntensity);

            return view('measure', compact('zone', 'carbonIntensity', 'color'));
        } else {
            return 'Failed to fetch data from the API. Please check your given zone or api token';
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
