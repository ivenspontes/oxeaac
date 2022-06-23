<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $check = Schema::hasTable('failed_jobs') ? 'table' : 'create';

        Schema::$check('failed_jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('failed_jobs', 'id')) {
                $table->unsignedBigInteger('id');
            }
            if (!Schema::hasColumn('failed_jobs', 'uuid')) {
                $table->string('uuid');
            }
            if (!Schema::hasColumn('failed_jobs', 'connection')) {
                $table->text('connection');
            }
            if (!Schema::hasColumn('failed_jobs', 'queue')) {
                $table->text('queue');
            }
            if (!Schema::hasColumn('failed_jobs', 'payload')) {
                $table->longText('payload');
            }
            if (!Schema::hasColumn('failed_jobs', 'exception')) {
                $table->longText('exception');
            }
            if (!Schema::hasColumn('failed_jobs', 'failed_at')) {
                $table->timestamp('failed_at')->useCurrent();
            }

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());

            if (!array_key_exists("failed_jobs_uuid_unique", $indexes)) {
                $table->unique('uuid');
            }
            if (!array_key_exists("primary", $indexes)) {
                $table->primary('id');
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
        Schema::dropIfExists('failed_jobs');
    }
}
