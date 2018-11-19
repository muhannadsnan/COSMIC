<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteProfileCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_currency', function (Blueprint $table) {
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('currency_id');

            $table->foreign('profile_id')
                    ->references('id')
                    ->on('profiles');
            
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
        Schema::table('profile_currency', function(Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropForeign(['profile_id']);
            $table->dropIfExists('profile_currency');
        });
    }
}
