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
        $check = Schema::hasTable('player_hirelings') ? 'table' : 'create';

        Schema::$check('player_hirelings', function (Blueprint $table) {
            if (!Schema::hasColumn('player_hirelings', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('player_hirelings', 'player_id')) {
                $table->integer('player_id');
            }
            if (!Schema::hasColumn('player_hirelings', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('player_hirelings', 'active')) {
                $table->unsignedTinyInteger('active')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'sex')) {
                $table->unsignedTinyInteger('sex')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'posx')) {
                $table->integer('posx')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'posy')) {
                $table->integer('posy')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'posz')) {
                $table->integer('posz')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'lookbody')) {
                $table->integer('lookbody')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'lookfeet')) {
                $table->integer('lookfeet')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'lookhead')) {
                $table->integer('lookhead')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'looklegs')) {
                $table->integer('looklegs')->default(0);
            }
            if (!Schema::hasColumn('player_hirelings', 'looktype')) {
                $table->integer('looktype')->default(136);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("player_id", $indexes)) {
                $table->index('player_id', 'player_id');
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
        Schema::dropIfExists('player_hirelings');
    }
};
