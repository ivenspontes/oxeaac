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
        Schema::create('player_prey', function (Blueprint $table) {
            $table->integer('player_id');
            $table->boolean('slot');
            $table->boolean('state');
            $table->string('raceid', 250);
            $table->boolean('option');
            $table->boolean('bonus_type');
            $table->boolean('bonus_rarity');
            $table->string('bonus_percentage', 250);
            $table->string('bonus_time', 250);
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
        Schema::dropIfExists('player_prey');
    }
};
