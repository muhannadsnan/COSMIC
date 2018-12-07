<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipBaseUser extends Migration
{ 
    public function up()
    {
        Schema::table('bases', function (Blueprint $table){
            $table->unsignedInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bases', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
    }
}
