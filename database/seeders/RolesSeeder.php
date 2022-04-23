<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($this->roles());
    }
    public function roles()
    {
        return $roles = array(
            ['id' => 1, 'role_name' => 'Super Admin', 'role_description' => 'Super Admin'],
            ['id' => 2, 'role_name' => 'Manager', 'role_description' => 'Manager'],
            ['id' => 3, 'role_name' => 'CTO', 'role_description' => 'CTO'],
            ['id' => 4, 'role_name' => 'HOD', 'role_description' => 'HOD'],
            ['id' => 5, 'role_name' => 'Staff', 'role_description' => 'STaff'],
        );
    }
}