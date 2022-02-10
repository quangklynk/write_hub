<?php

use Illuminate\Database\Seeder;

class StuInCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('stu_in_courses')->insert([
                'idCourse' => rand(1,5),
                'idStudent' => rand(1,10),
                'isPay' => rand(0,1),
            ]);
        }
    }
}
