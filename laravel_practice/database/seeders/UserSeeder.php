<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as FakerFactory;


class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customFaker = FakerFactory::create();

        $count = 5;
        //
        while ($count > 0) {
            $name = $customFaker->name;
            $email = $customFaker->email;
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