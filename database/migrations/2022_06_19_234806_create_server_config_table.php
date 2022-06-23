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
        $check = Schema::hasTable('server_config') ? 'table' : 'create';

        Schema::$check('server_config', function (Blueprint $table) {
            if (!Schema::hasColumn('server_config', 'config')) {
                $table->string('config', 50);
            }
            if (!Schema::hasColumn('server_config', 'value')) {
                $table->string('value', 256)->default('');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("primary", $indexes)) {
                $table->primary('config');
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
        Schema::dropIfExists('server_config');
    }
};
