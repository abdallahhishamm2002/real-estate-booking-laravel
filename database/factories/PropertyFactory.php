<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition()
    {
        $types = ['apartment', 'villa', 'twin_house', 'townhouse', 'duplex', 'penthouse', 'studio'];
        $statuses = ['for_sale', 'for_rent'];
        $cities = ['Cairo', 'Alexandria', 'Giza', 'Sharm El Sheikh', 'Hurghada'];
        $neighborhoods = ['New Cairo', 'Sheikh Zayed', 'North Coast', 'Maadi', 'Zamalek'];

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(1000000, 10000000),
            'location' => $this->faker->address,
            'city' => $this->faker->randomElement($cities),
            'neighborhood' => $this->faker->randomElement($neighborhoods),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 4),
            'area' => $this->faker->numberBetween(100, 500),
            'type' => $this->faker->randomElement($types),
            'status' => $this->faker->randomElement($statuses),
            'furnished' => $this->faker->boolean,
            'year_built' => $this->faker->numberBetween(2000, 2023),
            'amenities' => json_encode($this->faker->randomElements(['parking', 'pool', 'gym', 'security', 'elevator', 'garden'], 3)),
            'image' => $this->faker->imageUrl(800, 600, 'building'),
            'broker_name' => $this->faker->name,
            'broker_phone' => $this->faker->phoneNumber,
            'broker_email' => $this->faker->email,
        ];
    }
} 