<?php

namespace Database\Factories;

use App\Models\VehicleMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeighReceipt>
 */
class WeighReceiptFactory extends Factory
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
            "weigh_receipt_no" => $this->faker->bothify('##??###??'),
            "weigh_receipt_date" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "weigh_bridge" => $this->faker->name(),
        ];
    }
}
