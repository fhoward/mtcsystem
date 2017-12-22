<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1501421834PatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('patients')) {
            Schema::create('patients', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image')->nullable();
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('gender')->nullable();
                $table->date('birthday')->nullable();
                $table->string('guardians_name')->nullable();
                $table->string('contact_number')->nullable();
                $table->text('address')->nullable();
                $table->string('doctors_name')->nullable();
                $table->text('remarks')->nullable();
                $table->string('file')->nullable();
                
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
        Schema::dropIfExists('patients');
    }
}
