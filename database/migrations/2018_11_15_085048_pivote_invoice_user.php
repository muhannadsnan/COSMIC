<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteInvoiceUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_user', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices');
            
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
      
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
        Schema::table('invoice_user', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['invoice_id']);
            $table->dropIfExists('invoice_user');
        });
    }
}
