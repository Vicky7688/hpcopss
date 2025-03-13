<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('session_masters')->truncate();
        DB::table('session_masters')->insert(
            [
                'startDate' => '2025-04-01',
                'endDate' => '2026-03-31',
                'session_name' => '2025-26',
                'status' => 'Active',
                'auditPerformed' => 'No',
                'updatedBy' => '1'
            ]
        );
    }
}
