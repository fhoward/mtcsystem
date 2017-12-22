<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create597de10c19cd6PatientUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('patient_user')) {
            Schema::create('patient_user', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned()->nullable();
                $table->foreign('patient_id', 'fk_p_57919_57914_user_pat_597de10c19dfe')->references('id')->on('patients')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_57914_57919_patient__597de10c19e82')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('patient_user');
    }
}
