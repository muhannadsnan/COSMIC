<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipCurrenciesEntryinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entryinfos', function (Blueprint $table){
            $table->unsignedInteger('currency_id')->after('id');
            $table->foreign('currency_id')
                    ->references('id')
                    ->on('currencies');
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
            $table->dropForeign(['currency_id']);
        });
    }
}
