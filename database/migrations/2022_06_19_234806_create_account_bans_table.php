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
        $check = Schema::hasTable('account_bans') ? 'table' : 'create';

        Schema::$check('account_bans', function (Blueprint $table) {
            if (!Schema::hasColumn('account_bans', 'account_id')) {
                $table->unsignedInteger('account_id')->primary();
            }
            if (!Schema::hasColumn('account_bans', 'reason')) {
                $table->string('reason');
            }
            if (!Schema::hasColumn('account_bans', 'banned_at')) {
                $table->bigInteger('banned_at');
            }
            if (!Schema::hasColumn('account_bans', 'expires_at')) {
                $table->bigInteger('expires_at');
            }
            if (!Schema::hasColumn('account_bans', 'banned_by')) {
                $table->integer('banned_by')->index('banned_by');
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
        Schema::dropIfExists('account_bans');
    }
};
