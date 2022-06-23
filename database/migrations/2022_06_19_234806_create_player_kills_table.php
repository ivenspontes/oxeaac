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
        $check = Schema::hasTable('player_kills') ? 'table' : 'create';

        Schema::$check('player_kills', function (Blueprint $table) {
            if (!Schema::hasColumn('player_kills', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_kills', 'time')) {
                $table->unsignedBigInteger('time')->default(0);
            }
            if (!Schema::hasColumn('player_kills', 'target')) {
                $table->integer('target');
            }
            if (!Schema::hasColumn('player_kills', 'unavenged')) {
                $table->boolean('unavenged')->default(false);
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
        Schema::dropIfExists('player_kills');
    }
};
