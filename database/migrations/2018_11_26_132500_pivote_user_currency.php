<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_currency', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('currency_id');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            
            $table->foreign('currency_id')
                    ->references('id')
                    ->on('currencies');
      
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
        Schema::table('user_currency', function(Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('user_currency');
        });
    }
}
