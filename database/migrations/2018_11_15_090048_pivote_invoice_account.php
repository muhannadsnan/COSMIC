<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_account', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->integer('account_id')->unsigned()->nullable();

            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
            
            $table->foreign('account_id')
                    ->references('id')
                    ->on('accounts');
      
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
        Schema::table('invoice_account', function(Blueprint $table) {
            $table->dropForeign(['account_id']);
            $table->dropForeign(['invoice_id']);
            $table->dropIfExists('invoice_account');
        });
    }
}
