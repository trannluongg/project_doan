<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddManyColumnsInPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('identifier_name')->nullable()->after('guard_name');
            $table->string('description')->nullable()->after('identifier_name');
            $table->integer('module_id')->index()->default(0)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('identifier_name');
            $table->dropColumn('description');
            $table->dropColumn('module_id');
        });
    }
}
