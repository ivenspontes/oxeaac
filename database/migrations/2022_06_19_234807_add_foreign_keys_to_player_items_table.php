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
        Schema::table('player_items', function (Blueprint $table) {
            $table->foreign(['player_id'], 'player_items_players_fk')->references(['id'])->on('players')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_items', function (Blueprint $table) {
            $table->dropForeign('player_items_players_fk');
        });
    }
};
