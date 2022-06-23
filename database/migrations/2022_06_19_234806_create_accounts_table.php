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
        $check = Schema::hasTable('accounts') ? 'table' : 'create';

        Schema::$check('accounts', function (Blueprint $table) {
            if (!Schema::hasColumn('accounts', 'id')) {
                $table->increments('id');
            }
            if (!Schema::hasColumn('accounts', 'name')) {
                $table->string('name', 32);
            }
            if (!Schema::hasColumn('accounts', 'password')) {
                $table->char('password', 40);
            }
            if (!Schema::hasColumn('accounts', 'email')) {
                $table->string('email')->default('');
            }
            if (!Schema::hasColumn('accounts', 'premdays')) {
                $table->integer('premdays')->default(0);
            }
            if (!Schema::hasColumn('accounts', 'lastday')) {
                $table->unsignedInteger('lastday')->default(0);
            }
            if (!Schema::hasColumn('accounts', 'type')) {
                $table->unsignedTinyInteger('type')->default(1);
            }
            if (!Schema::hasColumn('accounts', 'coins')) {
                $table->unsignedInteger('coins')->default(0);
            }
            if (!Schema::hasColumn('accounts', 'creation')) {
                $table->unsignedInteger('creation')->default(0);
            }
            if (!Schema::hasColumn('accounts', 'recruiter')) {
                $table->integer('recruiter')->nullable()->default(0);
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("accounts_unique", $indexes)) {
                $table->unique('name', 'accounts_unique');
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
        Schema::dropIfExists('accounts');
    }
};
