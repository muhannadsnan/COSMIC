<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteAccountAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_account', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('child_id')->unsigned()->nullable();
            
            $table->foreign('parent_id')
                    ->references('id')
                    ->on('accounts');
      
            $table->foreign('child_id')
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
        Schema::table('account_account', function(Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['child_id']);
            $table->dropIfExists('account_account');
        });
    }
}
