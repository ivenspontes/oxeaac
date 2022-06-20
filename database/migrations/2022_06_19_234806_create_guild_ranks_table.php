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
        Schema::create('guild_ranks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('guild_id')->index('guild_id')->comment('guild');
            $table->string('name')->comment('rank name');
            $table->integer('level')->comment('rank level - leader, vice, member, maybe something else');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guild_ranks');
    }
};
