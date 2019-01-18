<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotGroupWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_warehouse', function (Blueprint $table) {
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('group_id');

            $table->foreign('group_id')
                    ->on('id')
                    ->references('groups');
            $table->foreign('warehouse_id')
                    ->on('id')
                    ->references('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_warehouse', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['warehouse_id']);
            $table->dropIfExists('group_warehouse');
        });
    }
}
