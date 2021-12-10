<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinations', function (Blueprint $table) {
            $table->id('coordination_id');
            $table->dateTime('date_time');
            $table->string('tema_koordinasi');
            $table->string('meeting_id')->nullable();;
            $table->string('meeting_passcode')->nullable();;
            $table->string('link_zoom')->nullable();;
            $table->string('keterangan')->nullable();;
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('coordinations');
    }
}
