<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuInCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stu_in_courses', function (Blueprint $table) {
            $table->unsignedInteger('idCourse');
            $table->unsignedInteger('idStudent');
            $table->boolean('isPay');
            $table->timestamps();
        });

        Schema::table('stu_in_courses', function (Blueprint $table) {
            $table->primary(['idCourse', 'idStudent']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stu_in_courses');
    }
}
