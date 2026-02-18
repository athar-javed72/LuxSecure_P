<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_properties_page_returns_200(): void
    {
        $response = $this->get(route('properties'));
        $response->assertStatus(200);
    }

    public function test_properties_page_shows_properties_from_database(): void
    {
        Property::create([
            'title' => 'Test House',
            'location' => 'Karachi',
            'type' => 'House',
            'price' => 50000000,
            'is_active' => true,
        ]);

        $response = $this->get(route('properties'));
        $response->assertStatus(200);
        $response->assertSee('Test House');
        $response->assertSee('Karachi');
    }
}
