<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'username' => 'superadmin',
                'refId' => '1',
                'role_id' => '1',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),

            ],
            [
                'name' => 'shanu',
                'username' => 'amdin',
                'refId' => '2',
                'role_id' => '2',
                'email' => 'dhanaikshanu@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
