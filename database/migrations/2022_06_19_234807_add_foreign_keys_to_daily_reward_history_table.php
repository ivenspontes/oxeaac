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
        Schema::table('daily_reward_history', function (Blueprint $table) {
            $table->foreign(['player_id'], 'daily_reward_history_player_fk')->references(['id'])->on('players')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_reward_history', function (Blueprint $table) {
            $table->dropForeign('daily_reward_history_player_fk');
        });
    }
};
