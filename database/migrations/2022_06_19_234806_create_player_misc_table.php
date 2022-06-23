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
        $check = Schema::hasTable('player_misc') ? 'table' : 'create';

        Schema::$check('player_misc', function (Blueprint $table) {
            if (!Schema::hasColumn('player_misc', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_misc', 'info')) {
                $table->binary('info');
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
        Schema::dropIfExists('player_misc');
    }
};
