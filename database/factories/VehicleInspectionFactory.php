<?php

namespace Database\Factories;

use App\Models\VehicleMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleInspection>
 */
class VehicleInspectionFactory extends Factory
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
            "inspection_no" => $this->faker->bothify('##??###??'),
            "inspection_date" => $this->faker->dateTimeBetween('-1 year', 'now'),
            "inspection_type" => $this->faker->randomElement(["SGS", "3rd Party", "Agency", "Shipper", "Consignee", "Self"]),
            "inspection_by" => $this->faker->name(),
            "inspection_result" => $this->faker->randomElement(["Passed", "Failed"]),
            "remark" => $this->faker->sentence(),
        ];
    }
}
