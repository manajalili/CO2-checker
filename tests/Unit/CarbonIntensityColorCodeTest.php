<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Http\Controllers\IntensityController;

class CarbonIntensityColorCodeTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new IntensityController();
    }

    public function testItReturnsRedWithHighIntensity(): void
    {
        $carbonIntensity = 450;
        $color = $this->controller->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('RED', $color, "Expected 'RED' for intensity above 400.");

    }

    public function testItReturnsGreenWithLowIntensity(): void
    {
        $carbonIntensity = 150;
        $color = $this->controller->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('GREEN', $color, "Expected 'GREEN' for intensity below 200.");
        
    }

    public function testItReturnsYellowWithAverageIntensity(): void
    {
        $carbonIntensity = 200;
        $color = $this->controller->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('YELLOW', $color, "Expected 'YELLOW' for intensity between 200 - 400.");
    }

    public function testMissingApiTokenReturnsErrorMessage()
    {
        putenv('API_KEY_TOKEN=');

        $response = $this->get('/?zone=pl');

        $response->assertStatus(500);
        $response->assertJson([
            'error' => 'API token is missing',
        ]);
    }

    public function testErrorResponseWithInvalidZone()
    {
        $response = $this->get('/?zone=invalid_zone');

        $response->assertStatus(302);
        $response->assertRedirect();
        $response->assertSessionHas('error', 'Error fetching data: Please check the zone and/or your token.');
    }

}
