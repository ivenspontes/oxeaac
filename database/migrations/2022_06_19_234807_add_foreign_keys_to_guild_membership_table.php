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
        Schema::table('guild_membership', function (Blueprint $table) {

            $Fks = array_map(function($key) {
                return $key->getName();
            }, Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table->getTable()));
            
            if (!in_array("guild_membership_guild_fk", $Fks)) {
                $table->foreign(['guild_id'], 'guild_membership_guild_fk')->references(['id'])->on('guilds')->onUpdate('CASCADE')->onDelete('CASCADE');
            }
            if (!in_array("guild_membership_player_fk", $Fks)) {
                $table->foreign(['player_id'], 'guild_membership_player_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
            }
            if (!in_array("guild_membership_rank_fk", $Fks)) {
                $table->foreign(['rank_id'], 'guild_membership_rank_fk')->references(['id'])->on('guild_ranks')->onUpdate('CASCADE')->onDelete('CASCADE');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guild_membership', function (Blueprint $table) {
            $table->dropForeign('guild_membership_guild_fk');
            $table->dropForeign('guild_membership_player_fk');
            $table->dropForeign('guild_membership_rank_fk');
        });
    }
};
