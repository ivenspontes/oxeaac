<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('accounts')) {
            Schema::create('accounts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 32)->unique('accounts_unique');
                $table->char('password', 40);
                $table->string('email')->default('');
                $table->integer('premdays')->default(0);
                $table->unsignedInteger('lastday')->default('0');
                $table->unsignedTinyInteger('type')->default('1');
                $table->unsignedInteger('coins')->default('0');
                $table->unsignedInteger('creation')->default('0');
                $table->integer('recruiter')->nullable()->default(0);
            });
        }
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
}
