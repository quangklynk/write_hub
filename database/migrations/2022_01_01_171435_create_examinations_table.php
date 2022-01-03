<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateExam');
            $table->unsignedInteger('idClass');
            $table->unsignedInteger('idTeacher');
            $table->unique(array('dateExam', 'idClass', 'idTeacher'));
            $table->timestamps();
        });

        Schema::table('examinations', function (Blueprint $table) {
            $table->foreign('idTeacher')->references('id')->on('teachers')->onUpdate('cascade');
            $table->foreign('idClass')->references('id')->on('classes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
}
