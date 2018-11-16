<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivoteGroupGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_group', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('child_id')->unsigned()->nullable();
            
            $table->foreign('parent_id')
                    ->references('id')
                    ->on('groups');
      
            $table->foreign('child_id')
                    ->references('id')
                    ->on('groups');
      
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
        Schema::table('group_group', function(Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['child_id']);
            $table->dropIfExists('group_group');
        });
    }
}
