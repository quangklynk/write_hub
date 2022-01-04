<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 2;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('types')->insert([
                'name' => $faker->name,
            ]);
        }
    }
}
