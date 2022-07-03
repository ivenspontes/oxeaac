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
        Schema::table('account_ban_history', function (Blueprint $table) {
            $Fks = array_map(function($key) {
                return $key->getName();
            }, Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table->getTable()));

            if (!in_array("account_bans_history_account_fk", $Fks)) {
                $table->foreign(['account_id'], 'account_bans_history_account_fk')->references(['id'])->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            }
            if (!in_array("account_bans_history_player_fk", $Fks)) {
                $table->foreign(['banned_by'], 'account_bans_history_player_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('account_ban_history', function (Blueprint $table) {
            $table->dropForeign('account_bans_history_account_fk');
            $table->dropForeign('account_bans_history_player_fk');
        });
    }
};
