<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'status_name' => 'Reserved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'status_name' => 'Deployed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'status_name' => 'Returned',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
