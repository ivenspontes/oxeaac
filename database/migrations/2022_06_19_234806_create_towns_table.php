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
        $check = Schema::hasTable('towns') ? 'table' : 'create';

        Schema::$check('towns', function (Blueprint $table) {
            if (!Schema::hasColumn('towns', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('towns', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('towns', 'posx')) {
                $table->integer('posx')->default(0);
            }
            if (!Schema::hasColumn('towns', 'posy')) {
                $table->integer('posy')->default(0);
            }
            if (!Schema::hasColumn('towns', 'posz')) {
                $table->integer('posz')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("name", $indexes)) {
                $table->unique('name', 'name');
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
        Schema::dropIfExists('towns');
    }
};
