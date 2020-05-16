<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Payment_modeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_modes')->insert([
            [
                'payment_mode_name' => 'Credit Card',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'payment_mode_name' => 'Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'payment_mode_name' => 'Bank Transfer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
