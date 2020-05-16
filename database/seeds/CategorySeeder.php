<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Sedan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'category_name' => 'SUV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'category_name' => 'Van',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
