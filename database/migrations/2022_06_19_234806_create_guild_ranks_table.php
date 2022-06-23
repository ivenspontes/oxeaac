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
        $check = Schema::hasTable('guild_ranks') ? 'table' : 'create';

        Schema::$check('guild_ranks', function (Blueprint $table) {
            if (!Schema::hasColumn('guild_ranks', 'id')) {
                $table->integer('id', true);
            }
            if (!Schema::hasColumn('guild_ranks', 'guild_id')) {
                $table->integer('guild_id')->comment('guild');
            }
            if (!Schema::hasColumn('guild_ranks', 'name')) {
                $table->string('name')->comment('rank name');
            }
            if (!Schema::hasColumn('guild_ranks', 'level')) {
                $table->integer('level')->comment('rank level - leader, vice, member, maybe something else');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("guild_id", $indexes)) {
                $table->index('guild_id', 'guild_id');
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
        Schema::dropIfExists('guild_ranks');
    }
};
