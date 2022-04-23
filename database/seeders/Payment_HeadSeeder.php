<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Payment_HeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_heads')->insert([
            'req_title' => 'Subscription',
            'req_desc' => 'Subscription Made for Data of the Company',
            'type' => 'Debit',
        ]);
    }
}
