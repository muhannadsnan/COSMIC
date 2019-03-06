<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return <void></void>
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial');
            $table->string('title');
            $table->text('desc')->nullable(); 
            $table->integer('client_acc'); // 1=cash, 2=xxx, 3=yyy
            $table->integer('NType'); // 1=buy, 2=sell, 3=returnBuy, 4=returnSell
            $table->date('NDate')->nullable();
            $table->string('ext_num');
            $table->string('int_num');
            $table->float('sum');
            $table->float('remaining');
            $table->float('currencyBuy')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
