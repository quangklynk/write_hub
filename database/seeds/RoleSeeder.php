<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'des' => 'admin',
        ]);
        DB::table('roles')->insert([
            'des' => 'teacher',
        ]);
        DB::table('roles')->insert([
            'des' => 'student',
        ]);
    }
}
