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
            "firstname" => "John",
            "lastname" => "Doe",
            "username" => "johndoe",
            "password" => Hash::make('johndoe123'),
            "email" => "johndoe@gmail.com",
            "mobile_no" => "09156457347",
            "role" => 0,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
