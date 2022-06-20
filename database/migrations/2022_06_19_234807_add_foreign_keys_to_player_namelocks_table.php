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
        Schema::table('player_namelocks', function (Blueprint $table) {
            $table->foreign(['namelocked_by'], 'player_namelocks_players2_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['player_id'], 'player_namelocks_players_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_namelocks', function (Blueprint $table) {
            $table->dropForeign('player_namelocks_players2_fk');
            $table->dropForeign('player_namelocks_players_fk');
        });
    }
};
