<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert($this->all_dep());
    }

    public function all_dep()
    {
        return $depts = array(
            ['id' => 1, 'dept' => 'TAMS Basic', 'status' => 'active'],
            ['id' => 2, 'dept' => 'TAMS Pro', 'status' => 'active'],
            ['id' => 3, 'dept' => 'Product Management', 'status' => 'active'],
            ['id' => 4, 'dept' => 'Customer Relations', 'status' => 'active'],
            ['id' => 5, 'dept' => 'Sales', 'status' =>  'active'],
        );
    }
}
