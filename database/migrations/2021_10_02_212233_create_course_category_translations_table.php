<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_category_id')->index();
            $table->string('name');
            $table->string('description');
            $table->string('locale');
            $table->timestamps();
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_category_translations');
    }
}
