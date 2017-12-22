<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501476169SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            if(Schema::hasColumn('schedules', 'start')) {
                $table->dropColumn('start');
            }
            if(Schema::hasColumn('schedules', 'end')) {
                $table->dropColumn('end');
            }
            
        });
Schema::table('schedules', function (Blueprint $table) {
            $table->date('date')->nullable();
                $table->time('start')->nullable();
                $table->time('end')->nullable();
                
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
            $table->dropColumn('date');
            $table->dropColumn('start');
            $table->dropColumn('end');
            
        });
Schema::table('schedules', function (Blueprint $table) {
                        $table->datetime('start')->nullable();
                $table->datetime('end')->nullable();
                
        });

    }
}
