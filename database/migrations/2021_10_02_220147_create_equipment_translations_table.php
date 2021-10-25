<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->index();
            $table->string('name');
            $table->string('description');
            $table->string('locale');
            $table->timestamps();
            $table->foreign('equipment_id')->references('id')->on('equipments')->onUpdate('cascade')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_translations');
    }
}
