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
        $check = Schema::hasTable('player_storage') ? 'table' : 'create';

        Schema::$check('player_storage', function (Blueprint $table) {
            if (!Schema::hasColumn('player_storage', 'player_id')) {
                $table->integer('player_id')->default(0);
            }
            if (!Schema::hasColumn('player_storage', 'key')) {
                $table->unsignedInteger('key')->default(0);
            }
            if (!Schema::hasColumn('player_storage', 'value')) {
                $table->integer('value')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("primary", $indexes)) {
                $table->primary(['player_id', 'key']);
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
        Schema::dropIfExists('player_storage');
    }
};
