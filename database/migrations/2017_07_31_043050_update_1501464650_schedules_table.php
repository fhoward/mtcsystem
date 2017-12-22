<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501464650SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            if(Schema::hasColumn('schedules', 'staffs_id')) {
                $table->dropForeign('57949_597deb9893a61');
                $table->dropIndex('57949_597deb9893a61');
                $table->dropColumn('staffs_id');
            }
            if(Schema::hasColumn('schedules', 'patient_name_id')) {
                $table->dropForeign('57949_597deb98a8df0');
                $table->dropIndex('57949_597deb98a8df0');
                $table->dropColumn('patient_name_id');
            }
            if(Schema::hasColumn('schedules', 'date')) {
                $table->dropColumn('date');
            }
            if(Schema::hasColumn('schedules', 'start')) {
                $table->dropColumn('start');
            }
            if(Schema::hasColumn('schedules', 'end')) {
                $table->dropColumn('end');
            }
            
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
                        $table->integer('staffs_id')->unsigned()->nullable();
                $table->foreign('staffs_id', '57949_597deb9893a61')->references('id')->on('users')->onDelete('cascade');
                $table->integer('patient_name_id')->unsigned()->nullable();
                $table->foreign('patient_name_id', '57949_597deb98a8df0')->references('id')->on('patients')->onDelete('cascade');
                $table->date('date')->nullable();
                $table->time('start');
                $table->time('end')->nullable();
                
        });

    }
}
