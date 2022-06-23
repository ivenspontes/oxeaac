<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $check = Schema::hasTable('password_resets') ? 'table' : 'create';

        Schema::$check('password_resets', function (Blueprint $table) {
            if (!Schema::hasColumn('password_resets', 'email')) {
                $table->string('email');
            }
            if (!Schema::hasColumn('password_resets', 'token')) {
                $table->string('token');
            }
            if (!Schema::hasColumn('password_resets', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("password_resets_email_index", $indexes)) {
                $table->index('email');
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
        Schema::dropIfExists('password_resets');
    }
}
