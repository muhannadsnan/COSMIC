<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_id')->nullable();
            $table->string('title');
            $table->text('desc');
            $table->string('ext'); // image extension
            $table->timestamps();

            $table->foreign('cat_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['cat_id']);
        });
        Schema::dropIfExists('products');
    }
}
