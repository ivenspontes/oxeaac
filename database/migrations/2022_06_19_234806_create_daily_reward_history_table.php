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
        $check = Schema::hasTable('coins_transactions') ? 'table' : 'create';

        Schema::$check('coins_transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('coins_transactions', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('coins_transactions', 'daystreak')) {
                $table->smallInteger('daystreak')->default(0);
            }
            if (!Schema::hasColumn('coins_transactions', 'player_id')) {
                $table->integer('player_id')->index('player_id');
            }
            if (!Schema::hasColumn('coins_transactions', 'timestamp')) {
                $table->integer('timestamp');
            }
            if (!Schema::hasColumn('coins_transactions', 'description')) {
                $table->string('description')->nullable();
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
        Schema::dropIfExists('daily_reward_history');
    }
};
