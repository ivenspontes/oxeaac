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
        $check = Schema::hasTable('guildwar_kills') ? 'table' : 'create';

        Schema::$check('guildwar_kills', function (Blueprint $table) {
            if (!Schema::hasColumn('guildwar_kills', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('guildwar_kills', 'killer')) {
                $table->string('killer', 50);
            }
            if (!Schema::hasColumn('guildwar_kills', 'target')) {
                $table->string('target', 50);
            }
            if (!Schema::hasColumn('guildwar_kills', 'killerguild')) {
                $table->integer('killerguild')->default(0);
            }
            if (!Schema::hasColumn('guildwar_kills', 'targetguild')) {
                $table->integer('targetguild')->default(0);
            }
            if (!Schema::hasColumn('guildwar_kills', 'warid')) {
                $table->integer('warid')->default(0);
            }
            if (!Schema::hasColumn('guildwar_kills', 'time')) {
                $table->bigInteger('time');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("guildwar_kills_unique", $indexes)) {
                $table->unique('warid', 'guildwar_kills_unique');
            }

            if (!array_key_exists("warid", $indexes)) {
                $table->index('warid', 'warid');
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
        Schema::dropIfExists('guildwar_kills');
    }
};
