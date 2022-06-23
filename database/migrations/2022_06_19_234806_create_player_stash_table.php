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
        $check = Schema::hasTable('player_stash') ? 'table' : 'create';

        Schema::$check('player_stash', function (Blueprint $table) {
            if (!Schema::hasColumn('player_stash', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_stash', 'item_id')) {
                $table->integer('item_id');
            }
            if (!Schema::hasColumn('player_stash', 'item_count')) {
                $table->integer('item_count');
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
        Schema::dropIfExists('player_stash');
    }
};
