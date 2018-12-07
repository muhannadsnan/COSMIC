<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipPaymentsInvoices extends Migration
{ 
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table){
            $table->unsignedInteger('payment_id')->after('id');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table){
            $table->dropForeign(['payment_id']);
        });
    }
}
