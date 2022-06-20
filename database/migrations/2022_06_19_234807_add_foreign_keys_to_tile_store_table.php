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
        Schema::table('tile_store', function (Blueprint $table) {
            $table->foreign(['house_id'], 'tile_store_account_fk')->references(['id'])->on('houses')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tile_store', function (Blueprint $table) {
            $table->dropForeign('tile_store_account_fk');
        });
    }
};
