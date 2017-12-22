<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1501424536SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('schedules')) {
            Schema::create('schedules', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('staffs_id')->unsigned()->nullable();
                $table->foreign('staffs_id', '57949_597deb9893a61')->references('id')->on('users')->onDelete('cascade');
                $table->integer('patient_name_id')->unsigned()->nullable();
                $table->foreign('patient_name_id', '57949_597deb98a8df0')->references('id')->on('patients')->onDelete('cascade');
                $table->date('date')->nullable();
                $table->time('start');
                $table->time('end')->nullable();
                $table->text('activity')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
