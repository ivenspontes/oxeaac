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
        $check = Schema::hasTable('ip_bans') ? 'table' : 'create';

        Schema::$check('ip_bans', function (Blueprint $table) {
            if (!Schema::hasColumn('ip_bans', 'ip')) {
                $table->integer('ip');
            }
            if (!Schema::hasColumn('ip_bans', 'reason')) {
                $table->string('reason');
            }
            if (!Schema::hasColumn('ip_bans', 'banned_at')) {
                $table->bigInteger('banned_at');
            }
            if (!Schema::hasColumn('ip_bans', 'expires_at')) {
                $table->bigInteger('expires_at');
            }
            if (!Schema::hasColumn('ip_bans', 'banned_by')) {
                $table->integer('banned_by');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("primary", $indexes)) {
                $table->primary('ip');
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
        Schema::dropIfExists('ip_bans');
    }
};
