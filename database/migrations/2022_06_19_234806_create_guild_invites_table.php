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
        Schema::create('guild_invites', function (Blueprint $table) {
            $table->integer('player_id')->default(0);
            $table->integer('guild_id')->default(0)->index('guild_id');
            $table->integer('date');

            $table->primary(['player_id', 'guild_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guild_invites');
    }
};
