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
            $table->string('title');
            $table->text('desc')->nullable(); 
            $table->integer('client_acc'); // 1=cash, 2=xxx, 3=yyy
            $table->integer('NType'); // 1=sell, 2=but, 3=returnSell, 4=returnBuy
            $table->string('ext_num');
            $table->string('int_num');
            $table->float('sum');
            $table->float('remaining');
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
