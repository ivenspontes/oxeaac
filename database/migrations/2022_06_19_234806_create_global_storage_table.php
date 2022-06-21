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
        $check = Schema::hasTable('global_storage') ? 'table' : 'create';

        Schema::$check('global_storage', function (Blueprint $table) {
            if (!Schema::hasColumn('global_storage', 'key')) {
                $table->string('key', 32);
            }
            if (!Schema::hasColumn('global_storage', 'value')) {
                $table->text('value');
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("global_storage_unique", $indexes)) {
                $table->unique('key', 'global_storage_unique');
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
        Schema::dropIfExists('global_storage');
    }
};
