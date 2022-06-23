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
        $check = Schema::hasTable('guilds') ? 'table' : 'create';

        Schema::$check('guilds', function (Blueprint $table) {
            if (!Schema::hasColumn('guilds', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('guilds', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('guilds', 'ownerid')) {
                $table->integer('ownerid');
            }
            if (!Schema::hasColumn('guilds', 'creationdata')) {
                $table->integer('creationdata');
            }
            if (!Schema::hasColumn('guilds', 'motd')) {
                $table->string('motd')->default('');
            }
            if (!Schema::hasColumn('guilds', 'residence')) {
                $table->integer('residence')->default(0);
            }
            if (!Schema::hasColumn('guilds', 'balance')) {
                $table->unsignedBigInteger('balance')->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("guilds_owner_unique", $indexes)) {
                $table->unique('ownerid', 'guilds_owner_unique');
            }

            if (!array_key_exists("guilds_name_unique", $indexes)) {
                $table->unique('name');
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
        Schema::dropIfExists('guilds');
    }
};
