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
        Schema::table('store_history', function (Blueprint $table) {
            $table->foreign(['account_id'], 'store_history_account_fk')->references(['id'])->on('accounts')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_history', function (Blueprint $table) {
            $table->dropForeign('store_history_account_fk');
        });
    }
};
