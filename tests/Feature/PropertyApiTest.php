<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_properties_returns_200(): void
    {
        $response = $this->getJson('/api/properties');
        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'meta']);
    }

    public function test_api_properties_includes_property_data(): void
    {
        Property::create([
            'title' => 'API Test Property',
            'location' => 'Lahore',
            'type' => 'Villa',
            'price' => 100000000,
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/properties');
        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => 'API Test Property']);
    }
}
