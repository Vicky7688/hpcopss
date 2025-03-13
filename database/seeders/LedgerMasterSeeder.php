<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedgerMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ledger_masters')->truncate();
        DB::table('ledger_masters')->insert([
            [
                'ledger_name' => 'Cash',
                'group_code' => 'C002',
                'ledger_code' => 'C002',
                'reference_id' => 1,
                'openingAmount' => 0,
                'openingType' => 'Dr',
                'status' => 'Active',
                'admin_id' => 1,
                'updatedBy' => 1,
                'can_change' => 'No'
            ],
        ]);
    }
}
