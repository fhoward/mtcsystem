<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501468394SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            if(Schema::hasColumn('schedules', 'activity')) {
                $table->dropColumn('activity');
            }
            
        });
Schema::table('schedules', function (Blueprint $table) {
            $table->string('activity')->nullable();
                
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
            $table->dropColumn('activity');
            
        });
Schema::table('schedules', function (Blueprint $table) {
                        $table->text('activity')->nullable();
                
        });

    }
}
