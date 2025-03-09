<?php

namespace Database\Factories;

use App\Models\VehicleMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoDetail>
 */
class CargoDetailFactory extends Factory
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
            "is_bulk" => $this->faker->boolean(),
            "bags_qty" => $this->faker->numberBetween(1, 100),
            "bags_weight" => $this->faker->randomFloat(2, 0, 100),
            "total_weight" => $this->faker->randomFloat(2, 0, 100),
            "bags_type" => $this->faker->randomElement(["Bags", "Boxes", "Crates", "Containers", "Flats", "Pallets", "Packs", "Sacks", "Tarpaks", "Tubs", "Units"]),
        ];
    }
}
