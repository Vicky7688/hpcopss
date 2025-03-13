<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleMastersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin', 'slug' => 'super-admin', 'status' => 'Active'],
            ['name' => 'Head Office', 'slug' => 'head-office', 'status' => 'Active'],
            ['name' => 'Manager', 'slug' => 'manager', 'status' => 'Active'],
            ['name' => 'Agent', 'slug' => 'agent', 'status' => 'Active'],
        ];

        // Insert data into the user_role_masters table
        DB::table('user_role_masters')->insert($roles);
    }
}
