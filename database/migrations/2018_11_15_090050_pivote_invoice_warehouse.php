<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_invoice', function (Blueprint $table) {
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('invoice_id');

            $table->foreign('warehouse_id')
                    ->references('id')
                    ->on('warehouses');
            
            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
      
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
        Schema::table('warehouse_invoice', function(Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropForeign(['warehouse_id']);
            $table->dropIfExists('warehouse_invoice');
        });
    }
}
