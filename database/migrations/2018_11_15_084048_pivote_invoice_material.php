<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_material', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->integer('material_id')->unsigned()->nullable();

            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
            
            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials');
      
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
        Schema::table('invoice_material', function(Blueprint $table) {
            $table->dropForeign(['material_id']);
            $table->dropForeign(['invoice_id']);
            $table->dropIfExists('invoice_material');
        });
    }
}
