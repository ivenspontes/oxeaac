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
        Schema::table('account_bans', function (Blueprint $table) {
            $table->foreign(['account_id'], 'account_bans_account_fk')->references(['id'])->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['banned_by'], 'account_bans_player_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_bans', function (Blueprint $table) {
            $table->dropForeign('account_bans_account_fk');
            $table->dropForeign('account_bans_player_fk');
        });
    }
};