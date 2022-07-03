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
        Schema::table('coins_transactions', function (Blueprint $table) {
            $Fks = array_map(function($key) {
                return $key->getName();
            }, Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table->getTable()));
            
            if (!in_array("coins_transactions_account_fk", $Fks)) {
                $table->foreign(['account_id'], 'coins_transactions_account_fk')->references(['id'])->on('accounts')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
        Schema::table('coins_transactions', function (Blueprint $table) {
            $table->dropForeign('coins_transactions_account_fk');
        });
    }
};
