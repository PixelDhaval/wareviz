<?php

namespace Database\Factories;

use App\Models\Party;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleMovement>
 */
class VehicleMovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "party_id" => Party::inRandomOrder()->first()->id,
            "supplier_id" => Party::inRandomOrder()->first()->id,
            "cargo_id" => $this->faker->numberBetween(1, 100),
            "godown_id" => $this->faker->numberBetween(1, 100),
            "type" => $this->faker->randomElement(["load", "unload"]),
            "movement_type" => $this->faker->randomElement(["vehicle", "rail", "godown_shifting", "party_shifting", "opening", "shortage", "excess"]),
            "movement_at" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "net_weight" => $this->faker->randomFloat(2, 0, 100),
            "gross_weight" => $this->faker->randomFloat(2, 0, 100),
            "tare_weight" => $this->faker->randomFloat(2, 0, 100),
            "vehicle_no" => $this->faker->bothify('??##??####'),
            "driver_name" => $this->faker->name(),
            "driver_no" => $this->faker->phoneNumber(),
            "driver_lic_no" => $this->faker->bothify('??##############'),
            "lr_no" => $this->faker->bothify("######"),
            "lr_date" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "rr_number" => $this->faker->bothify("######"),
            "rr_date" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "is_direct" => $this->faker->boolean(),
            "is_inspection" => $this->faker->boolean(),
            "receipt_no" => $this->faker->bothify("######"),
            "receipt_date" => $this->faker->dateTimeBetween('-1 year', 'now'),  
        ];
    }
}
