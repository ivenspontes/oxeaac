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
        Schema::create('guilds', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->unique();
            $table->integer('ownerid')->unique('guilds_owner_unique');
            $table->integer('creationdata');
            $table->string('motd')->default('');
            $table->integer('residence')->default(0);
            $table->unsignedBigInteger('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guilds');
    }
};
