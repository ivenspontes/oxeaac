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
        Schema::create('player_taskhunt', function (Blueprint $table) {
            $table->integer('player_id');
            $table->boolean('slot');
            $table->boolean('state');
            $table->string('raceid', 250);
            $table->boolean('upgrade');
            $table->boolean('rarity');
            $table->string('kills', 250);
            $table->bigInteger('disabled_time');
            $table->bigInteger('free_reroll');
            $table->binary('monster_list')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_taskhunt');
    }
};
