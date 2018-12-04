<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipEntriesEntryinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entryinfos', function (Blueprint $table){
            $table->unsignedInteger('entry_id')->after('id');
            $table->foreign('entry_id')
                    ->references('id')
                    ->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entryinfos', function (Blueprint $table){
            $table->dropForeign(['entry_id']);
        });
    }
}
