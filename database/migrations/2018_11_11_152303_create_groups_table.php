<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nType')->default(0); // [0 => normal, 1 => organizing]
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('code');
            $table->timestamps();

            $table->foreign('parent_id')
                    ->references('id')
                    ->on('groups'); // cannot delete group containing groups
                    //->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
