<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial');
            $table->string('code');
            $table->string('title_ar')->nullable();
            $table->text('desc')->nullable();
            $table->string('NType')->default("N"); // Normal, Closing, Aggregative, Distributive
            
            $table->unsignedInteger('closeAcc')->nullable();
            $table->string('KType')->default("M"); // M, D, MD

            $table->string('EType')->nullable(); // M, D, null
            $table->string('EVal')->nullable();
            $table->unsignedInteger('ECurrency')->nullable();
            $table->float('EBuy')->nullable();
            $table->boolean('EisPart')->default(0);
            
            $table->boolean('hideInSearch')->default(0);
            $table->boolean('CCisReq')->default(0);
            $table->string('CCTitle')->nullable();

            $table->float('TOFL_income')->nullable();
            $table->string('TOFL_ownership')->nullable();
            $table->float('TOFL_finCenter')->nullable();
            $table->float('TOFL_cashFlow')->nullable();
            $table->string('TOFL_clasDet')->nullable();

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
        Schema::dropIfExists('accounts');
    }
}
