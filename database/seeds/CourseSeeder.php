<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
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
        $limit = 5;

        for ($i = 0; $i < $limit; $i++) {
            $randomId = rand(1,5);
            DB::table('courses')->insert([
                'name' => $faker->name,
                'idTeacher' => $randomId,
                'from' => $faker->date,
                'to' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
