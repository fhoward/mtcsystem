<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501419518UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
                $table->string('emp_id')->nullable();
                $table->string('confirm_password')->nullable();
                $table->string('rfid_no')->nullable();
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('gender')->nullable();
                $table->string('contact_no')->nullable();
                $table->string('prc_number')->nullable();
                $table->string('sss_id')->nullable();
                $table->string('tin_no')->nullable();
                $table->string('philhealth_id')->nullable();
                $table->string('guardian_name')->nullable();
                $table->string('guardian_contact_no')->nullable();
                $table->text('guardian_address')->nullable();
                
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
            $table->dropColumn('avatar');
            $table->dropColumn('emp_id');
            $table->dropColumn('confirm_password');
            $table->dropColumn('rfid_no');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('contact_no');
            $table->dropColumn('prc_number');
            $table->dropColumn('sss_id');
            $table->dropColumn('tin_no');
            $table->dropColumn('philhealth_id');
            $table->dropColumn('guardian_name');
            $table->dropColumn('guardian_contact_no');
            $table->dropColumn('guardian_address');
            
        });

    }
}
