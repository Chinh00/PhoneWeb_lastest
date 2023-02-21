<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user")->insert([
            "fullname" => "Admin",
            "email" => "hanvipno9@gmail.com",
            "phone" => "0368849143",
            "role_id" => "1",
            "password" => bcrypt("123"),
            "status" => "1",
            
        ]);
    }
}
