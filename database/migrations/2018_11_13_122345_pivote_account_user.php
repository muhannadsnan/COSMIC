<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteAccountUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_user', function (Blueprint $table) {
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('account_id')
                    ->references('id')
                    ->on('accounts');
      
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
        Schema::table('account_user', function(Blueprint $table) {
            $table->dropForeign(['account_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('account_user');
        });
    }
}
