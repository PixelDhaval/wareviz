<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Party;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Party::factory()->count(100)->create();
    }
}
