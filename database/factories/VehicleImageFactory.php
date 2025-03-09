<?php

namespace Database\Factories;

use App\Models\VehicleMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleImage>
 */
class VehicleImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "vehicle_movement_id" => VehicleMovement::inRandomOrder()->first()->id,
            "image_path" => $this->faker->imageUrl(),
            "uploaded_at" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "remark" => $this->faker->sentence()
        ];
    }
}
