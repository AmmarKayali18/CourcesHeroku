<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_category_id')->index();
            $table->foreignId('teacher_id')->index();
            $table->foreignId('class_id')->index();
            $table->integer('duration');
            $table->integer('sessions_count');
            $table->date('start');
            $table->date('end');
            $table->double('price');
            $table->boolean('done')->default(0);
            $table->boolean('equipments')->default(0);
            $table->string('image_path');
            $table->timestamps();
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_halls')->onUpdate('cascade')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
