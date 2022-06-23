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
        $check = Schema::hasTable('tile_store') ? 'table' : 'create';

        Schema::$check('tile_store', function (Blueprint $table) {
            if (!Schema::hasColumn('tile_store', 'house_id')) {
                $table->integer('house_id');
            }
            if (!Schema::hasColumn('tile_store', 'data')) {
                $table->binary('data');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("house_id", $indexes)) {
                $table->index('house_id', 'house_id');
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
        Schema::dropIfExists('tile_store');
    }
};
