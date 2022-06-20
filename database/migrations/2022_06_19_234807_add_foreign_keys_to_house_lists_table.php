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
        Schema::table('house_lists', function (Blueprint $table) {
            $table->foreign(['house_id'], 'houses_list_house_fk')->references(['id'])->on('houses')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_lists', function (Blueprint $table) {
            $table->dropForeign('houses_list_house_fk');
        });
    }
};
