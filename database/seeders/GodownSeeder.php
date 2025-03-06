<?php

namespace Database\Seeders;

use App\Models\Godown;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GodownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Godown::factory()->count(100)->create();
    }
}
