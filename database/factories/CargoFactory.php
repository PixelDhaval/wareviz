<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "cargo_name" => $this->faker->name(),
            "description" => $this->faker->sentence(),
            "rate" => $this->faker->randomFloat(2, 0, 100),
            "hsn" => $this->faker->numerify('######'),
            "unit" => $this->faker->randomElement(["KG", "TON", "LITRE", "METER", "FEET"]),
            "brand_name" => $this->faker->name(),
        ];
    }
}
