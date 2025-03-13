<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('share_masters')->truncate();
        DB::table('share_masters')->insert([
            [
               'type' => 'Class A'
            ],
            [
                'type' => 'Class B'
             ],
             [
                'type' => 'Class C'
             ],
             [
                'type' => 'Class D'
             ]
        ]);
    }
}
