<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('currency_id')->nullable();
            $table->string('title');
            $table->text('desc');
            $table->string('code');
            $table->string('unit1')->nullable(); // these units can be set to m:m relationship
            $table->string('unit2')->nullable(); // 
            $table->string('conversation')->nullable(); //
            $table->string('barcode_unit1')->nullable(); 
            $table->string('barcode_unit2')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('dimention_unit')->nullable();
            $table->integer('VAT')->default(0); //percent
            $table->integer('total_weight')->nullable();
            $table->integer('net_weight')->nullable();
            $table->integer('drained_weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->integer('last_purchase')->default(0);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::table('materials', function(Blueprint $table) {
            $table->dropForeign('materials_mat_guide_id_foreign');
        });
        Schema::dropIfExists('materials');
    }
}
