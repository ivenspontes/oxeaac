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
        $check = Schema::hasTable('store_history') ? 'table' : 'create';

        Schema::$check('store_history', function (Blueprint $table) {
            if (!Schema::hasColumn('store_history', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('store_history', 'account_id')) {
                $table->unsignedInteger('account_id');
            }
            if (!Schema::hasColumn('store_history', 'mode')) {
                $table->smallInteger('mode')->default(0);
            }
            if (!Schema::hasColumn('store_history', 'description')) {
                $table->string('description', 3500);
            }
            if (!Schema::hasColumn('store_history', 'coin_amount')) {
                $table->integer('coin_amount');
            }
            if (!Schema::hasColumn('store_history', 'time')) {
                $table->unsignedBigInteger('time');
            }
            if (!Schema::hasColumn('store_history', 'timestamp')) {
                $table->integer('timestamp')->default(0);
            }
            if (!Schema::hasColumn('store_history', 'coins')) {
                $table->integer('coins')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("account_id", $indexes)) {
                $table->index('account_id', 'account_id');
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
        Schema::dropIfExists('store_history');
    }
};
