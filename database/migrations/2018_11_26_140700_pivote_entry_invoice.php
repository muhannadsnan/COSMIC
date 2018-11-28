<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteEntryInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_invoice', function (Blueprint $table) {
            $table->unsignedInteger('entry_id');
            $table->unsignedInteger('invoice_id');

            $table->foreign('entry_id')
                    ->references('id')
                    ->on('entries');
            
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
        Schema::table('entry_invoice', function(Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropForeign(['entry_id']);
            $table->dropIfExists('entry_invoice');
        });
    }
}
