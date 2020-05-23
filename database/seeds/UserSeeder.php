<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "firstname" => "Admin",
                "lastname" => "Account",
                "username" => "admin",
                "password" => Hash::make('admin123'),
                "email" => "admin@mail.com",
                "mobile_no" => "09123456789",
                "role" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        
            [
                "firstname" => "Normal",
                "lastname" => "Account",
                "username" => "normal",
                "password" => Hash::make('normal123'),
                "email" => "normal@mail.com",
                "mobile_no" => "09123456789",
                "role" => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
