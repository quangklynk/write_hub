<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idStudent');
            $table->unsignedInteger('idTeacher')->nullable();
            $table->unsignedInteger('idExam');
            $table->unsignedInteger('idType');
            $table->unsignedInteger('idCategory');
            $table->unsignedInteger('idStatus');
            $table->text('content');
            $table->float('score')->nullable();
            $table->unique(array('idStudent', 'idExam'));
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('idStudent')->references('id')->on('students')->onUpdate('cascade');
            $table->foreign('idExam')->references('id')->on('examinations')->onUpdate('cascade');
            $table->foreign('idType')->references('id')->on('types')->onUpdate('cascade');
            $table->foreign('idCategory')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('idStatus')->references('id')->on('statuses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
