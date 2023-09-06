<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name = Str::random(4);
        $email = $name . "@gmail.com";
        $pass = 'pass1234';
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pass)
        ]);
    }
}