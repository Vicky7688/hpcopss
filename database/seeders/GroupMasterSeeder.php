<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('group_masters')->truncate();
        DB::table('group_masters')->insert([
            ['group_name'=>'Cash', 'group_code'=>'C002', 'balsheet_head'=>'Cash', 'group_type'=>'Asset', 'drcr' => 'Dr', 'status'=>'Active','can_change' =>'No' ,'updatedBy'=>1],
            ['group_name'=>'Bank', 'group_code'=>'BANK001', 'balsheet_head'=>'Bank', 'group_type'=>'Asset','drcr' => 'Dr',  'status'=>'Active', 'can_change' =>'No','updatedBy'=>1],
            ['group_name'=>'Income', 'group_code'=>'INCM001', 'balsheet_head'=>'Income', 'group_type'=>'Income','drcr' => 'Cr',  'status'=>'Active', 'can_change' =>'No','updatedBy'=>1],
            ['group_name'=>'Expenses', 'group_code'=>'EXPN001', 'balsheet_head'=>'Expenses', 'group_type'=>'Expenditure','drcr' => 'Dr',  'status'=>'Active', 'can_change' =>'No','updatedBy'=>1],
            ['group_name' => 'Loans & Advances(Assets)', 'group_code' => 'LON001', 'balsheet_head' => 'Loans & Advances', 'group_type' => 'Asset','drcr' => 'Dr',  'status' => 'Active', 'can_change' =>'No','updatedBy' => 1],
            ['group_name' => 'Fixed Assets', 'group_code' => 'FIX001', 'balsheet_head' => 'Fixed Assets', 'group_type' => 'Fixed Asset','drcr' => 'Dr',  'status' => 'Active', 'can_change' =>'No','updatedBy' => 1],
        ]);
    }
}
