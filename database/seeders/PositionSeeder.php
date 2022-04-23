<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert($this->positions());
    }

    private function positions()
    {
        return $all_pos = array(
            ['id' => 1, 'position' => 'Graduate Trainee', 'status' => 'active'],
            ['id' => 2, 'position' => 'Intern', 'status' => 'active'],
            ['id' => 3, 'position' => 'Junior Developer', 'status' => 'active'],
            ['id' => 4, 'position' => 'Senior Developer', 'status' => 'active'],
            ['id' => 5, 'position' => 'Lead Developer', 'status' => 'active'],
            ['id' => 6, 'position' => 'Chief Technical Officer', 'status' => 'active'],
            ['id' => 7, 'position' => 'Human Resource Manager', 'status' => 'active'],
            ['id' => 8, 'position' => 'Sale Representative Manager', 'status' => 'active'],
            ['id' => 9, 'position' => 'Customer Relationship Manager', 'status' => 'active'],
            ['id' => 10, 'position' => 'Product Manager', 'status' => 'active'],
            ['id' => 11, 'position' => 'Sales Rep', 'status' => 'active'],
            ['id' => 12, 'position' => 'Chief Executive Officer', 'status' => 'active'],
            ['id' => 13, 'position' => 'Graduate Trainee', 'status' => 'active'],
            ['id' => 14, 'position' => 'Accountant', 'status' => 'active'],
            ['id' => 15, 'position' => 'Gateman', 'status' => 'active'],
            ['id' => 16, 'position' => 'Facility Manager', 'status' => 'active'],
        );
    }
}
