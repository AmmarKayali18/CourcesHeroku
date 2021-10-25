<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsUserCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments_user_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->index();
            $table->foreignId('user_course_id')->index();
            $table->boolean('temporary');
            $table->boolean('delivered');
            
            $table->timestamps();
            $table->foreign('equipment_id')->references('id')->on('equipments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_course_id')->references('id')->on('user_courses')->onUpdate('cascade')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments_user_courses');
    }
}
