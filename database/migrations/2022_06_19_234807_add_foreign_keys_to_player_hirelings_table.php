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
        Schema::table('player_hirelings', function (Blueprint $table) {
            $table->foreign(['player_id'], 'player_hirelings_ibfk_1')->references(['id'])->on('players')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_hirelings', function (Blueprint $table) {
            $table->dropForeign('player_hirelings_ibfk_1');
        });
    }
};
