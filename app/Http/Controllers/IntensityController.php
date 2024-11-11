<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IntensityController extends Controller
{
    public function getResponseFromApi(Request $request)
    {
        $apiToken = env('API_KEY_TOKEN');

        if (!$apiToken) {
            return response()->json(['error' => 'API token is missing'], 500);
        }

        $zone = $request->input('zone');

        $url = "https://api.electricitymap.org/v3/carbon-intensity/latest?zone={$zone}";

        try {
            $response = Http::withHeaders([
                'auth-token' => $apiToken,
            ])->get($url);

            $carbonIntensity = $response->json()['carbonIntensity'];

            $color = $this->getColorByCarbonIntensity($carbonIntensity);

            return view('intensity/index', compact('zone', 'carbonIntensity', 'color'));

        } catch (\Exception $e) {
            \Log::error('Error fetching carbon intensity data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error fetching data: Please check the zone and/or your token.');
        }
    }

    public function getColorByCarbonIntensity($carbonIntensity)
    {
        if ($carbonIntensity > 400) {
            return "RED";
        } elseif ($carbonIntensity < 200) {
            return "GREEN";
        }
        return "YELLOW";
    }

}
