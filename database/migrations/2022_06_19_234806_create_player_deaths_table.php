<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_deaths', function (Blueprint $table) {
            $table->integer('player_id')->index('player_id');
            $table->unsignedBigInteger('time')->default(0);
            $table->integer('level')->default(1);
            $table->string('killed_by')->index('killed_by');
            $table->boolean('is_player')->default(true);
            $table->string('mostdamage_by', 100)->index('mostdamage_by');
            $table->boolean('mostdamage_is_player')->default(false);
            $table->boolean('unjustified')->default(false);
            $table->boolean('mostdamage_unjustified')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_deaths');
    }
};
