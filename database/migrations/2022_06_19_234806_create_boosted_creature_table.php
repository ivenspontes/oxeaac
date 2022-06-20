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
        $check = Schema::hasTable('boosted_creature') ? 'table' : 'create';

        Schema::$check('boosted_creature', function (Blueprint $table) {
            if (!Schema::hasColumn('boosted_creature', 'looktype')) {
                $table->integer('looktype')->default(136);
            }
            if (!Schema::hasColumn('boosted_creature', 'lookfeet')) {
                $table->integer('lookfeet')->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'looklegs')) {
                $table->integer('looklegs')->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'lookhead')) {
                $table->integer('lookhead')->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'lookbody')) {
                $table->integer('lookbody')->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'lookaddons')) {
                $table->integer('lookaddons')->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'lookmount')) {
                $table->integer('lookmount')->nullable()->default(0);
            }
            if (!Schema::hasColumn('boosted_creature', 'date')) {
                $table->string('date', 250)->default('')->primary();
            }
            if (!Schema::hasColumn('boosted_creature', 'boostname')) {
                $table->text('boostname')->nullable();
            }
            if (!Schema::hasColumn('boosted_creature', 'raceid')) {
                $table->string('raceid', 250)->default('');
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
        Schema::dropIfExists('boosted_creature');
    }
};
