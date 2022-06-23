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
        $check = Schema::hasTable('guild_wars') ? 'table' : 'create';

        Schema:: $check('guild_wars', function (Blueprint $table) {
            if (!Schema::hasColumn('guild_wars', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('guild_wars', 'guild1')) {
                $table->integer('guild1')->default(0);
            }
            if (!Schema::hasColumn('guild_wars', 'guild2')) {
                $table->integer('guild2')->default(0);
            }
            if (!Schema::hasColumn('guild_wars', 'name1')) {
                $table->string('name1');
            }
            if (!Schema::hasColumn('guild_wars', 'name2')) {
                $table->string('name2');
            }
            if (!Schema::hasColumn('guild_wars', 'status')) {
                $table->tinyInteger('status')->default(0);
            }
            if (!Schema::hasColumn('guild_wars', 'started')) {
                $table->bigInteger('started')->default(0);
            }
            if (!Schema::hasColumn('guild_wars', 'ended')) {
                $table->bigInteger('ended')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("guild1", $indexes)) {
                $table->index('guild1', 'guild1');
            }

            if (!array_key_exists("guild2", $indexes)) {
                $table->index('guild2', 'guild2');
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
        Schema::dropIfExists('guild_wars');
    }
};
