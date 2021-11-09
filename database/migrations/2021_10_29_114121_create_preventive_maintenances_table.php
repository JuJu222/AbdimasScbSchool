<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreventiveMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preventive_maintenances', function (Blueprint $table) {
            $table->id('preventive_maintenance_id');
            $table->foreignId('equipment_id');
            $table->integer('year');
            $table->tinyInteger('month');
            $table->tinyInteger('week');
            $table->string('status');
            $table->timestamps();

            $table->foreign('equipment_id')
                ->references('equipment_id')->on('equipments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preventive_maintenances');
    }
}
