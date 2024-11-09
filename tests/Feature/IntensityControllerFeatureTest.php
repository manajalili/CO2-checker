<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\IntensityController;

class IntensityControllerFeatureTest extends TestCase
{
    public function testGeneralFunctionsIntensityControllerFeature()
    {
        $zone = 'pl';

        $response = $this->get("/?zone={$zone}");

        $carbonIntensity = $response->viewData('carbonIntensity');
        $color = $response->viewData('color');

        $response->assertStatus(200);
        $response->assertViewIs('intensity.index');
        $this->assertIsNumeric($carbonIntensity);
        $response->assertViewHas('color', $color);
    }

}
