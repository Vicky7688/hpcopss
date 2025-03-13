<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Solan','type'=> 'HeadOffice','code' => '1'],
            ['name' => 'Shimla','type'=> 'BranchOffice','code' => '2'],
            ['name' => 'Sirmour','type'=> 'BranchOffice','code' => '3'],
            ['name' => 'Kangra','type'=> 'BranchOffice','code' => '4'],

        ];

        // Insert data into the user_role_masters table
        DB::table('branch_masters')->insert($roles);
    }
}
