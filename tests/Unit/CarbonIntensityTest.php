<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\CountryController;

class CarbonIntensityTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new YourController();
    }

    public function if_api_is_responding_ok_test(): void
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);
    }

    public function it_returns_red_with_high_intensity(): void
    {
        $carbonIntensity = 450;
        $color = this->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('RED', $color, "Expected 'RED' for intensity above 400.");

    }

    public function it_returns_green_with_low_intensity(): void
    {
        $carbonIntensity = 150;
        $color = this->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('GREEN', $color, "Expected 'GREEN' for intensity below 200.");

        
    }

    public function it_returns_yellow_with_average_intensity(): void
    {
        $carbonIntensity = 250;
        $color = this->getColorByCarbonIntensity($carbonIntensity);

        $this->assertEquals('YELLO', $color, "Expected 'YELLOW' for intensity between 200 - 400.");

        
    }
}