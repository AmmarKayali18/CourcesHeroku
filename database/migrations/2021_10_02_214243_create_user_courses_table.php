<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->index();
            $table->foreignId('student_id')->index();
            $table->boolean('done');
            $table->boolean('continue');
            $table->double('mark');
            $table->date('register_date');
            $table->date('end_date');
            $table->boolean('taken_equipment');
            $table->boolean('is_paid');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_courses');
    }
}
