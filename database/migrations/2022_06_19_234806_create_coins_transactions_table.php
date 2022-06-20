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
        $check = Schema::hasTable('coins_transactions') ? 'table' : 'create';

        Schema::$check('coins_transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('coins_transactions', 'id')) {
                $table->increments('id');
            }
            if (!Schema::hasColumn('coins_transactions', 'account_id')) {
                $table->unsignedInteger('account_id')->index('account_id');
            }
            if (!Schema::hasColumn('coins_transactions', 'type')) {
                $table->unsignedTinyInteger('type');
            }
            if (!Schema::hasColumn('coins_transactions', 'amount')) {
                $table->unsignedInteger('amount');
            }
            if (!Schema::hasColumn('coins_transactions', 'description')) {
                $table->string('description', 3500);
            }
            if (!Schema::hasColumn('coins_transactions', 'timestamp')) {
                $table->timestamp('timestamp')->nullable()->useCurrent();
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
        Schema::dropIfExists('coins_transactions');
    }
};
