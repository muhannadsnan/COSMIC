<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipBasesProfiles extends Migration
{ 
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table){
            $table->unsignedInteger('base_id')->after('id');
            $table->foreign('base_id')->references('id')->on('bases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table){
            $table->dropForeign(['base_id']);
        });
    }
}
