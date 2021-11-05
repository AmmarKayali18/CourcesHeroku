<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_equipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_course_id')->index();
            $table->foreignId('equipment_id')->index();
            $table->boolean('temporary')->default(0);

            $table->foreign('equipment_id')->references('id')->on('equipments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_course_id')->references('id')->on('user_courses')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_equipments');
    }
}
