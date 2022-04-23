<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          
        ]);
        $this->call([
            PositionSeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            RolesSeeder::class,
            Payment_HeadSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
