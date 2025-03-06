<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Godown>
 */
class GodownFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "godown_name" => $this->faker->name(),
            "description" => $this->faker->sentence(),
            "godown_no" => $this->faker->numerify('#########'),
            "location" => $this->faker->city(),
            "longitude" => $this->faker->longitude(),
            "latitude" => $this->faker->latitude(),
            "capacity" => $this->faker->numerify('#########'),
        ];
    }
}
