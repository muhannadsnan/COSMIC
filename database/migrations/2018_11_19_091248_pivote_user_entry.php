<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_entry', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('entry_id');

            $table->foreign('user_id')
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
        Schema::table('user_entry', function(Blueprint $table) {
            $table->dropForeign(['entry_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('user_entry');
        });
    }
}
