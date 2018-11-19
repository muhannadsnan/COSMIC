<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteAccountEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_entry', function (Blueprint $table) {
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('entry_id');

            $table->foreign('account_id')
                    ->references('id')
                    ->on('users');
            
            $table->foreign('entry_id')
                    ->references('id')
                    ->on('entries');
      
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
        Schema::table('account_entry', function(Blueprint $table) {
            $table->dropForeign(['entry_id']);
            $table->dropForeign(['account_id']);
            $table->dropIfExists('account_entry');
        });
    }
}
