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
        Schema::table('guild_invites', function (Blueprint $table) {
            $table->foreign(['guild_id'], 'guild_invites_guild_fk')->references(['id'])->on('guilds')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['player_id'], 'guild_invites_player_fk')->references(['id'])->on('players')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guild_invites', function (Blueprint $table) {
            $table->dropForeign('guild_invites_guild_fk');
            $table->dropForeign('guild_invites_player_fk');
        });
    }
};
