<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
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
            DB::table('posts')->insert([
                'idStudent' => rand(1,8),
                'idTeacher' => rand(1,10),
                'idExam' => rand(1,6),
                'idType' => rand(1,2),
                'idCategory' => rand(1,5),
                'idStatus' => rand(1,3),
                'content' => $faker->text,
            ]);
        }
    }
}
