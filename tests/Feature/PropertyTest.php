<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_property_can_be_created()
    {
        $property = Property::factory()->create([
            'title' => 'Test Property',
            'price' => 1000000,
            'type' => 'apartment',
        ]);

        $this->assertDatabaseHas('properties', [
            'title' => 'Test Property',
            'price' => 1000000,
            'type' => 'apartment',
        ]);
    }

    public function test_property_can_be_updated()
    {
        $property = Property::factory()->create();
        
        $property->update([
            'title' => 'Updated Title',
            'price' => 2000000,
        ]);

        $this->assertDatabaseHas('properties', [
            'id' => $property->id,
            'title' => 'Updated Title',
            'price' => 2000000,
        ]);
    }

    public function test_property_can_be_deleted()
    {
        $property = Property::factory()->create();
        
        $property->delete();

        $this->assertDatabaseMissing('properties', [
            'id' => $property->id,
        ]);
    }

    public function test_property_has_required_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Property::create([
            'title' => 'Incomplete Property',
            // Missing required fields
        ]);
    }

    public function test_property_has_valid_amenities()
    {
        $property = Property::factory()->create([
            'amenities' => json_encode(['swimming_pool', 'gym', 'security']),
        ]);

        $this->assertIsArray(json_decode($property->amenities));
        $this->assertCount(3, json_decode($property->amenities));
    }

    public function test_property_has_valid_image_url()
    {
        $property = Property::factory()->create([
            'image' => 'https://example.com/image.jpg',
        ]);

        $this->assertStringStartsWith('http', $property->image);
    }

    public function test_can_list_properties()
    {
        Property::factory()->count(3)->create();

        $response = $this->get('/properties');

        $response->assertStatus(200)
            ->assertViewIs('properties.index')
            ->assertViewHas('properties');
    }

    public function test_can_view_single_property()
    {
        $property = Property::factory()->create();

        $response = $this->get("/properties/{$property->id}");

        $response->assertStatus(200)
            ->assertViewIs('properties.show')
            ->assertViewHas('property', $property);
    }

    public function test_can_create_property()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);

        $propertyData = [
            'title' => 'Test Property',
            'description' => 'A beautiful test property',
            'price' => 1000000,
            'location' => 'Test Location',
            'city' => 'Test City',
            'neighborhood' => 'Test Neighborhood',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => 150,
            'type' => 'apartment',
            'status' => 'for_sale',
            'furnished' => true,
            'year_built' => 2020,
            'amenities' => ['parking', 'pool'],
            'broker_name' => 'Test Broker',
            'broker_phone' => '1234567890',
            'broker_email' => 'broker@test.com'
        ];

        $response = $this->post('/properties', $propertyData);

        $response->assertRedirect('/properties')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('properties', [
            'title' => 'Test Property',
            'price' => 1000000
        ]);
    }

    public function test_can_update_property()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);

        $property = Property::factory()->create();
        $updatedData = [
            'title' => 'Updated Property',
            'price' => 2000000
        ];

        $response = $this->put("/properties/{$property->id}", $updatedData);

        $response->assertRedirect('/properties')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('properties', [
            'id' => $property->id,
            'title' => 'Updated Property',
            'price' => 2000000
        ]);
    }

    public function test_can_delete_property()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);

        $property = Property::factory()->create();

        $response = $this->delete("/properties/{$property->id}");

        $response->assertRedirect('/properties')
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('properties', [
            'id' => $property->id
        ]);
    }

    public function test_guest_cannot_create_property()
    {
        $propertyData = Property::factory()->raw();

        $response = $this->post('/properties', $propertyData);

        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_update_property()
    {
        $property = Property::factory()->create();
        $updatedData = ['title' => 'Updated Property'];

        $response = $this->put("/properties/{$property->id}", $updatedData);

        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_delete_property()
    {
        $property = Property::factory()->create();

        $response = $this->delete("/properties/{$property->id}");

        $response->assertRedirect('/login');
    }
} 