<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501420125UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('profession_id')->unsigned()->nullable();
                $table->foreign('profession_id', '57914_597dda5ce1b32')->references('id')->on('professions')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('57914_597dda5ce1b32');
            $table->dropIndex('57914_597dda5ce1b32');
            $table->dropColumn('profession_id');
            
        });

    }
}
