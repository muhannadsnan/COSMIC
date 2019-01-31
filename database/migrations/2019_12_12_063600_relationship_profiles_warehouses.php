<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipProfilesWarehouses extends Migration
{ 
    public function up()
    {
        Schema::table('groups', function (Blueprint $table){
            $table->unsignedInteger('profile_id')->after('id');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });

        Schema::table('materials', function (Blueprint $table){
            $table->unsignedInteger('profile_id')->after('id');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });

        Schema::table('warehouses', function (Blueprint $table){
            $table->unsignedInteger('profile_id')->after('id');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table){
            $table->dropForeign(['profile_id']);
        });

        Schema::table('materials', function (Blueprint $table){
            $table->dropForeign(['profile_id']);
        });

        Schema::table('warehouses', function (Blueprint $table){
            $table->dropForeign(['profile_id']);
        });
    }
}
