<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteUserGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('group_id')
                    ->references('id')
                    ->on('groups');
      
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
        Schema::table('user_group', function(Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['user_id']);
            $table->dropIfExists('user_group');
        });
    }
}
