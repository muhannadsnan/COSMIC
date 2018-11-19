<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteWarehouseEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_entry', function (Blueprint $table) {
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('entry_id');

            $table->foreign('warehouse_id')
                    ->references('id')
                    ->on('users');
            
            $table->foreign('entry_id')
                    ->references('id')
                    ->on('entries');
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouse_entry', function(Blueprint $table) {
            $table->dropForeign(['entry_id']);
            $table->dropForeign(['warehouse_id']);
            $table->dropIfExists('warehouse_entry');
        });
    }
}
