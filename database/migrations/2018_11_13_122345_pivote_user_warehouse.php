<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_warehouse', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('warehouse_id');
      
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->foreign('warehouse_id')
                    ->references('id')
                    ->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_warehouse', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['warehouse_id']);
            $table->dropIfExists('user_warehouse');
        });
    }
}
