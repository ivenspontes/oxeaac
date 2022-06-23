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
        $check = Schema::hasTable('account_ban_history') ? 'table' : 'create';

        Schema::$check('account_ban_history', function (Blueprint $table) {
            if (!Schema::hasColumn('account_ban_history', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('account_ban_history', 'account_id')) {
                $table->unsignedInteger('account_id');
            }
            if (!Schema::hasColumn('account_ban_history', 'reason')) {
                $table->string('reason');
            }
            if (!Schema::hasColumn('account_ban_history', 'banned_at')) {
                $table->bigInteger('banned_at');
            }
            if (!Schema::hasColumn('account_ban_history', 'expired_at')) {
                $table->bigInteger('expired_at');
            }
            if (!Schema::hasColumn('account_ban_history', 'banned_by')) {
                $table->integer('banned_by');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("account_id", $indexes)) {
                $table->index('account_id', 'account_id');
            }

            if (!array_key_exists("banned_by", $indexes)) {
                $table->index('banned_by', 'banned_by');
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
        Schema::dropIfExists('account_ban_history');
    }
};
