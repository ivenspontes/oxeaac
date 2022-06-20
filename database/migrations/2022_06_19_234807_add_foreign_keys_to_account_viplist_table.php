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
        Schema::table('account_viplist', function (Blueprint $table) {
            $table->foreign(['account_id'], 'account_viplist_account_fk')->references(['id'])->on('accounts')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['player_id'], 'account_viplist_player_fk')->references(['id'])->on('players')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_viplist', function (Blueprint $table) {
            $table->dropForeign('account_viplist_account_fk');
            $table->dropForeign('account_viplist_player_fk');
        });
    }
};
