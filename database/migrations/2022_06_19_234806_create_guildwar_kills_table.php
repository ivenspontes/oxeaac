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
        Schema::create('guildwar_kills', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('killer', 50);
            $table->string('target', 50);
            $table->integer('killerguild')->default(0);
            $table->integer('targetguild')->default(0);
            $table->integer('warid')->default(0)->unique('guildwar_kills_unique');
            $table->bigInteger('time');

            $table->index(['warid'], 'warid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guildwar_kills');
    }
};
