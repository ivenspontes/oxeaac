<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $check = Schema::hasTable('personal_access_tokens') ? 'table' : 'create';

        Schema::$check('personal_access_tokens', function (Blueprint $table) {
            if (!Schema::hasColumn('personal_access_tokens', 'id')) {
                $table->unsignedBigInteger('id');
            }
            if (!Schema::hasColumn('personal_access_tokens', 'tokenable_type')) {
                $table->string('tokenable_type');
            }
            if (!Schema::hasColumn('personal_access_tokens', 'tokenable_id')) {
                $table->unsignedBigInteger('tokenable_id');
            }
            if (!Schema::hasColumn('personal_access_tokens', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('personal_access_tokens', 'token')) {
                $table->string('token', 64);
            }
            if (!Schema::hasColumn('personal_access_tokens', 'abilities')) {
                $table->text('abilities')->nullable();
            }
            if (!Schema::hasColumn('personal_access_tokens', 'last_used_at')) {
                $table->timestamp('last_used_at')->nullable();
            }
            if (!Schema::hasColumn('personal_access_tokens', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
            if (!Schema::hasColumn('personal_access_tokens', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("personal_access_tokens_token_unique", $indexes)) {
                $table->unique('token');
            }

            if (!array_key_exists("primary", $indexes)) {
                $table->primary('id');
            }

            if (!array_key_exists("personal_access_tokens_tokenable_type_tokenable_id_index", $indexes)) {
                $table->index(['tokenable_type', 'tokenable_id']);
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
        Schema::dropIfExists('personal_access_tokens');
    }
}
