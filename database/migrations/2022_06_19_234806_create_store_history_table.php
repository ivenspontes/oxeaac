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
        Schema::create('store_history', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('account_id')->index('account_id');
            $table->smallInteger('mode')->default(0);
            $table->string('description', 3500);
            $table->integer('coin_amount');
            $table->unsignedBigInteger('time');
            $table->integer('timestamp')->default(0);
            $table->integer('coins')->default(0);
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
