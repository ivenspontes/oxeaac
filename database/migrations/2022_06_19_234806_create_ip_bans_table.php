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
        Schema::create('ip_bans', function (Blueprint $table) {
            $table->integer('ip')->primary();
            $table->string('reason');
            $table->bigInteger('banned_at');
            $table->bigInteger('expires_at');
            $table->integer('banned_by')->index('banned_by');
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
