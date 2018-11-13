<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipMateialsMatGuides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materials', function (Blueprint $table){
            $table->unsignedInteger('mat_guide_id')->after('currency_id'); // #4

            $table->foreign('mat_guide_id')
                    ->references('id')
                    ->on('mat_guides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materials', function (Blueprint $table){
            $table->dropForeign(['mat_guide_id']);
            $table->dropColumn('mat_guide_id');
        });
    }
}
