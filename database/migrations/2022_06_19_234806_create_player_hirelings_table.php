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
        Schema::create('player_hirelings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('player_id')->index('player_id');
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('active')->default(0);
            $table->unsignedTinyInteger('sex')->default(0);
            $table->integer('posx')->default(0);
            $table->integer('posy')->default(0);
            $table->integer('posz')->default(0);
            $table->integer('lookbody')->default(0);
            $table->integer('lookfeet')->default(0);
            $table->integer('lookhead')->default(0);
            $table->integer('looklegs')->default(0);
            $table->integer('looktype')->default(136);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_hirelings');
    }
};
