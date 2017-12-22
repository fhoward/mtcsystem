<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop597e8885eb350597e8885e9163PatientUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('patient_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('patient_user')) {
            Schema::create('patient_user', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id', 'fk_p_57919_57914_user_pat_597de10c06a38')->references('id')->on('patients');
                $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_57914_57919_patient__597de10bedb38')->references('id')->on('users');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
