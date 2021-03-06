<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
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
            DB::table('teachers')->insert([
                'idUser' => rand(1,20),
                'name' => $faker->name,
                'birth' => $faker->date,
                'address' => $faker->text,
            ]);
        }
    }
}
