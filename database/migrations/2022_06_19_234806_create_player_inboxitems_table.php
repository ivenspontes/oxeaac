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
        Schema::create('player_inboxitems', function (Blueprint $table) {
            $table->integer('player_id');
            $table->integer('sid');
            $table->integer('pid')->default(0);
            $table->integer('itemtype')->default(0);
            $table->integer('count')->default(0);
            $table->binary('attributes');

            $table->unique(['player_id', 'sid'], 'player_inboxitems_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_inboxitems');
    }
};
