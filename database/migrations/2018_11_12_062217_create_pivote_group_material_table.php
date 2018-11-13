<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivoteGroupMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_material', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('material_id')->unsigned()->nullable();
            
            $table->foreign('group_id')
                    ->references('id')
                    ->on('groups');
      
            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials');
      
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
        Schema::dropIfExists('group_group');
    }
}
