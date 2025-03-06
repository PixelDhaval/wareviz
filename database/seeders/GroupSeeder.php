<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $groups = [
            ['id' => 1, 'name' => 'Capital Account', 'description' => "Includes owner's capital and reserves & surplus."],
            ['id' => 2, 'name' => 'Loans (Liability)', 'description' => 'Includes secured and unsecured loans, and bank overdrafts.'],
            ['id' => 3, 'name' => 'Current Assets', 'description' => 'Includes bank accounts, cash-in-hand, deposits, loans & advances.'],
            ['id' => 4, 'name' => 'Current Liabilities', 'description' => 'Includes sundry creditors, provisions, duties & taxes.'],
            ['id' => 5, 'name' => 'Investments', 'description' => 'Includes long-term and short-term investments.'],
            ['id' => 6, 'name' => 'Fixed Assets', 'description' => 'Includes tangible and intangible assets.'],
            ['id' => 7, 'name' => 'Suspense Account', 'description' => 'Temporary holding account for unclassified transactions.'],
            ['id' => 8, 'name' => 'Branch/Divisions', 'description' => 'Accounts for transactions related to different branches.'],
            ['id' => 9, 'name' => 'Misc. Expenses (Assets)', 'description' => 'Includes preliminary expenses, deferred revenue expenses.'],
            ['id' => 10, 'name' => 'Sales Account', 'description' => 'Records revenue generated from sales.'],
            ['id' => 11, 'name' => 'Purchase Account', 'description' => 'Records purchases of goods and services.'],
            ['id' => 12, 'name' => 'Direct Income (Income)', 'description' => 'Includes income directly related to core business operations.'],
            ['id' => 13, 'name' => 'Direct Expenses (Expenses)', 'description' => 'Includes expenses directly related to the production or service.'],
            ['id' => 14, 'name' => 'Indirect Income (Income)', 'description' => 'Includes non-operating income like interest, rent received.'],
            ['id' => 15, 'name' => 'Indirect Expenses (Expenses)', 'description' => 'Includes administrative and selling expenses.'],
        ];

        DB::table('groups')->insert($groups);
    }
}
