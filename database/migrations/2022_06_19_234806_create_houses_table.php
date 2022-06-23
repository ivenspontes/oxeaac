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
        $check = Schema::hasTable('houses') ? 'table' : 'create';

        Schema::$check('houses', function (Blueprint $table) {
            if (!Schema::hasColumn('houses', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('houses', 'owner')) {
                $table->integer('owner');
            }
            if (!Schema::hasColumn('houses', 'paid')) {
                $table->unsignedInteger('paid')->default(0);
            }
            if (!Schema::hasColumn('houses', 'warnings')) {
                $table->integer('warnings')->default(0);
            }
            if (!Schema::hasColumn('houses', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('houses', 'rent')) {
                $table->integer('rent')->default(0);
            }
            if (!Schema::hasColumn('houses', 'town_id')) {
                $table->integer('town_id')->default(0);
            }
            if (!Schema::hasColumn('houses', 'bid')) {
                $table->integer('bid')->default(0);
            }
            if (!Schema::hasColumn('houses', 'bid_end')) {
                $table->integer('bid_end')->default(0);
            }
            if (!Schema::hasColumn('houses', 'last_bid')) {
                $table->integer('last_bid')->default(0);
            }
            if (!Schema::hasColumn('houses', 'highest_bidder')) {
                $table->integer('highest_bidder')->default(0);
            }
            if (!Schema::hasColumn('houses', 'size')) {
                $table->integer('size')->default(0);
            }
            if (!Schema::hasColumn('houses', 'guildid')) {
                $table->integer('guildid')->nullable();
            }
            if (!Schema::hasColumn('houses', 'beds')) {
                $table->integer('beds')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("owner", $indexes)) {
                $table->index('owner', 'owner');
            }

            if (!array_key_exists("town_id", $indexes)) {
                $table->index('town_id', 'town_id');
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
        Schema::dropIfExists('houses');
    }
};
