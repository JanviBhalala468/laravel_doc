<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        //
        while ($count > 0) {
            $name = Str::random(4);
            $email = $name . "@gmail.com";
            $pass = 'pass1234';
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($pass)
            ]);
            $count--;
        }
        //User::factory(User::class, 5)->create();
    }
}