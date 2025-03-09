<?php

namespace Database\Seeders;

use App\Models\CargoDetail;
use App\Models\VehicleImage;
use App\Models\VehicleInspection;
use App\Models\VehicleMovement;
use App\Models\WeighReceipt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // VehicleMovement::factory()
        //     ->count(10)
        //     ->create();
        // VehicleImage::factory()
        //     ->count(100)
        //     ->create();
        // VehicleInspection::factory()
        //     ->count(100)
        //     ->create();
        // WeighReceipt::factory()
        //     ->count(100)
        //     ->create();
        CargoDetail::factory()
            ->count(100)
            ->create();
    }
}
