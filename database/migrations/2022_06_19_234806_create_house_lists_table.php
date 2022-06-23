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
        $check = Schema::hasTable('house_lists') ? 'table' : 'create';

        Schema::$check('house_lists', function (Blueprint $table) {
            if (!Schema::hasColumn('house_lists', 'house_id')) {
                $table->integer('house_id');
            }
            if (!Schema::hasColumn('house_lists', 'listid')) {
                $table->integer('listid');
            }
            if (!Schema::hasColumn('house_lists', 'list')) {
                $table->text('list');
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
        Schema::dropIfExists('house_lists');
    }
};
