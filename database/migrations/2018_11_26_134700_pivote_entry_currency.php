<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteEntryCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_currency', function (Blueprint $table) {
            $table->unsignedInteger('entry_id');
            $table->unsignedInteger('currency_id');

            $table->foreign('entry_id')
                    ->references('id')
                    ->on('entrys');
            
            $table->foreign('currency_id')
                    ->references('id')
                    ->on('currencies');
      
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
        Schema::table('entry_currency', function(Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropForeign(['entry_id']);
            $table->dropIfExists('entry_currency');
        });
    }
}
