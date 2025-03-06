<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['id' => 1, 'state_name' => 'Jammu & Kashmir'],
            ['id' => 2, 'state_name' => 'Himachal Pradesh'],
            ['id' => 3, 'state_name' => 'Punjab'],
            ['id' => 4, 'state_name' => 'Chandigarh'],
            ['id' => 5, 'state_name' => 'Uttarakhand'],
            ['id' => 6, 'state_name' => 'Haryana'],
            ['id' => 7, 'state_name' => 'Delhi'],
            ['id' => 8, 'state_name' => 'Rajasthan'],
            ['id' => 9, 'state_name' => 'Uttar Pradesh'],
            ['id' => 10, 'state_name' => 'Bihar'],
            ['id' => 11, 'state_name' => 'Sikkim'],
            ['id' => 12, 'state_name' => 'Arunachal Pradesh'],
            ['id' => 13, 'state_name' => 'Nagaland'],
            ['id' => 14, 'state_name' => 'Manipur'],
            ['id' => 15, 'state_name' => 'Mizoram'],
            ['id' => 16, 'state_name' => 'Tripura'],
            ['id' => 17, 'state_name' => 'Meghalaya'],
            ['id' => 18, 'state_name' => 'Assam'],
            ['id' => 19, 'state_name' => 'West Bengal'],
            ['id' => 20, 'state_name' => 'Jharkhand'],
            ['id' => 21, 'state_name' => 'Odisha'],
            ['id' => 22, 'state_name' => 'Chhattisgarh'],
            ['id' => 23, 'state_name' => 'Madhya Pradesh'],
            ['id' => 24, 'state_name' => 'Gujarat'],
            ['id' => 25, 'state_name' => 'Daman & Diu'],
            ['id' => 26, 'state_name' => 'Dadra & Nagar Haveli'],
            ['id' => 27, 'state_name' => 'Maharashtra'],
            ['id' => 28, 'state_name' => 'Andhra Pradesh'],
            ['id' => 29, 'state_name' => 'Karnataka'],
            ['id' => 30, 'state_name' => 'Goa'],
            ['id' => 31, 'state_name' => 'Lakshadweep'],
            ['id' => 32, 'state_name' => 'Kerala'],
            ['id' => 33, 'state_name' => 'Tamil Nadu'],
            ['id' => 34, 'state_name' => 'Puducherry'],
            ['id' => 35, 'state_name' => 'Andaman & Nicobar Islands'],
            ['id' => 36, 'state_name' => 'Telangana'],
            ['id' => 37, 'state_name' => 'Andhra Pradesh (New)'],
        ];

        DB::table('states')->insert($states);
    }
}
