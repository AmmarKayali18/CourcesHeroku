<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassHallTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_hall_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_hall_id')->index();
            $table->string('name');
            $table->string('locale');
            $table->timestamps();
            $table->foreign('class_hall_id')->references('id')->on('class_halls')->onUpdate('cascade')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_hall_translations');
    }
}
