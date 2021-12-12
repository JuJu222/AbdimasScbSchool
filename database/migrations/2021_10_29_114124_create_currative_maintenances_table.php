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
            $table->foreignId('school_id');
            $table->foreignId('project_id');
            $table->string('quantity')->nullable();
            $table->string('biaya')->nullable();
            $table->integer('year_plan');
            $table->tinyInteger('month_plan');
            $table->tinyInteger('week_plan');
            $table->integer('year_real')->nullable();;
            $table->tinyInteger('month_real')->nullable();;
            $table->date('date_real')->nullable();
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('project_id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('school_id')
                ->references('school_id')->on('schools')
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
