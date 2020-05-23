<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [   
                "model" => "2014 Honda Civic",
                "description" => "1.8E Modulo AT",
                "rates" => 2700.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car1.jpg",
                "quantity" => 4,
                "category_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        
            [
                "model" => "2014 Honda Civic",
                "description" => "1.6G AT",
                "rates" => 2400.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car2.jpg",
                "quantity" => 0,
                "category_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2014 Toyota Fortuner",
                "description" => "2.5G AT",
                "rates" => 3400.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car3.jpg",
                "quantity" => 3,
                "category_id" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2014 Toyota Hiace",
                "description" => "GL Grandia AT",
                "rates" => 4200.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car4.jpg",
                "quantity" => 4,
                "category_id" => 3,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2014 Toyota Vios",
                "description" => "MT",
                "rates" => 1900.00,
                "transmission" => "Manual Transmission",
                "image" => "images/car5.jpg",
                "quantity" => 4,
                "category_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2015 Toyota Innova",
                "description" => "2.5G AT",
                "rates" => 2600.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car6.jpg",
                "quantity" => 3,
                "category_id" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2013 Mitsubishi Lancer",
                "description" => "1.6EX AT",
                "rates" => 2100.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car7.jpg",
                "quantity" => 2,
                "category_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2015 Honda Mobilio",
                "description" => "1.5 CVT AT",
                "rates" => 2300.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car8.jpg",
                "quantity" => 2,
                "category_id" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],

            [
                "model" => "2016 Toyota Vios",
                "description" => "1.3 AT",
                "rates" => 2000.00,
                "transmission" => "Automatic Transmission",
                "image" => "images/car9.jpg",
                "quantity" => 4,
                "category_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ]);
    }
    
}
