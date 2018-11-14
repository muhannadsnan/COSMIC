<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_customer', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
      
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
        Schema::table('user_customer', function(Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('user_customer');
        });
    }
}
