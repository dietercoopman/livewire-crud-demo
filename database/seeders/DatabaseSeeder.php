<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([['name' => 'user'], ['name' => 'administrator']]);

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {

            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => rand(0, 10).$faker->email,
                'password' => Hash::make($faker->password),
                'role_id'  => rand(1, 2),
                'marbles'  => rand(0, 50)
            ]);
        }
    }
}
