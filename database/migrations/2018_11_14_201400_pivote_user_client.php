<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_client', function (Blueprint $table) {
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients');
      
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
        Schema::table('user_client', function(Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('user_client');
        });
    }
}
