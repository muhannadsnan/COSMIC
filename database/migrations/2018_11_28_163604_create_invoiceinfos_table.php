<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('mat');
            $table->float('qty');
            $table->float('single');
            $table->float('total');
            $table->timestamps();
            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoiceinfos', function (Blueprint $table){
            $table->dropForeign(['invoice_id']);
        });
        Schema::dropIfExists('invoiceinfos');
    }
}
