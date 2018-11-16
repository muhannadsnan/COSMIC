<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_client', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();

            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
            
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients');
      
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
        Schema::table('invoice_client', function(Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['invoice_id']);
            $table->dropIfExists('invoice_client');
        });
    }
}
