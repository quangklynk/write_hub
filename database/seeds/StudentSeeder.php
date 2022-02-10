<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('students')->insert([
                'idUser' => rand(20,40),
                'name' => $faker->name,
                'birth' => $faker->date,
                'address' => $faker->text,
            ]);
        }
    }
}
