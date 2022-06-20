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
        Schema::create('player_namelocks', function (Blueprint $table) {
            $table->integer('player_id')->unique('player_namelocks_unique');
            $table->string('reason');
            $table->bigInteger('namelocked_at');
            $table->integer('namelocked_by')->index('namelocked_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_namelocks');
    }
};
