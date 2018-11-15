<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_customer', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();

            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
            
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
      
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
        Schema::table('invoice_customer', function(Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['invoice_id']);
            $table->dropIfExists('invoice_customer');
        });
    }
}
