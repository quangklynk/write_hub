<?php

use Illuminate\Database\Seeder;
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
        $faker = Faker\Factory::create();
        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'password' => Hash::make('123'),
                'flag' => 0,
                'idRole' =>  3,
            ]);
        }
    }
}
