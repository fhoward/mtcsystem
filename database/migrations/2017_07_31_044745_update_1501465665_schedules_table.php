<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501465665SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->integer('staff_id')->unsigned()->nullable();
                $table->foreign('staff_id', '57949_597e8c40d855c')->references('id')->on('users')->onDelete('cascade');
                $table->integer('patient_id')->unsigned()->nullable();
                $table->foreign('patient_id', '57949_597e8c40ec9fe')->references('id')->on('patients')->onDelete('cascade');
                $table->datetime('start')->nullable();
                $table->datetime('end')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('57949_597e8c40d855c');
            $table->dropIndex('57949_597e8c40d855c');
            $table->dropColumn('staff_id');
            $table->dropForeign('57949_597e8c40ec9fe');
            $table->dropIndex('57949_597e8c40ec9fe');
            $table->dropColumn('patient_id');
            $table->dropColumn('start');
            $table->dropColumn('end');
            
        });

    }
}
