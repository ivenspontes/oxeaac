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
        Schema::table('ip_bans', function (Blueprint $table) {
            $table->foreign(['banned_by'], 'ip_bans_players_fk')->references(['id'])->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ip_bans', function (Blueprint $table) {
            $table->dropForeign('ip_bans_players_fk');
        });
    }
};
