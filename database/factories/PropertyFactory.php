<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(2, 10);
        return [
            "title" => $this->faker->realTextBetween(15, 30),
            "description" => $this->faker->realTextBetween(300, 600),
            "surface" => $this->faker->numberBetween(20, 350),
            "rooms" => $rooms,
            "bedrooms" => $this->faker->numberBetween(1, $rooms),
            "floor" => $this->faker->numberBetween(0, 15),
            "price" => $this->faker->numberBetween(10000, 1000000),
            "city" => $this->faker->city(),
            "address" => $this->faker->address(),
            "postal_code" => $this->faker->postcode(),
            "sold" => $this->faker->boolean(true),
            // "thumbnail" => $this->faker->title()
        ];
    }
}
