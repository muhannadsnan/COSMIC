<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotMaterialWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_warehouse', function (Blueprint $table){
            $table->unsignedInteger('material_id');
            $table->unsignedInteger('warehouse_id');

            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials');
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
        Schema::table('material_warehouse', function (Blueprint $table){
            $table->dropForeign(['material_id']);
            $table->dropForeign(['warehouse_id']);
            $table->dropIfExists('material_warehouse');
        });
    }
}
