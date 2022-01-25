<?php

use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
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
            DB::table('examinations')->insert([
                'dateExam' => $faker->date,
                'idTeacher' => rand(2,6),
                'idCourse' => rand(1,5),
                'duration' => rand(60,120),
            ]);
        }
    }
}
