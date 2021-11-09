<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrativeMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currative_maintenances', function (Blueprint $table) {
            $table->id('currative_maintenance_id');
            $table->foreignId('project_id');
            $table->integer('year');
            $table->tinyInteger('month');
            $table->tinyInteger('week');
            $table->string('status');
            $table->timestamps();

            $table->foreign('project_id')
                ->references('project_id')->on('projects')
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
        Schema::dropIfExists('currative_maintenances');
    }
}
