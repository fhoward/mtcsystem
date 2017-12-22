<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501465057PatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            if(Schema::hasColumn('patients', 'first_name')) {
                $table->dropColumn('first_name');
            }
            if(Schema::hasColumn('patients', 'middle_name')) {
                $table->dropColumn('middle_name');
            }
            if(Schema::hasColumn('patients', 'last_name')) {
                $table->dropColumn('last_name');
            }
            
        });
Schema::table('patients', function (Blueprint $table) {
            $table->string('name')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('name');
            
        });
Schema::table('patients', function (Blueprint $table) {
                        $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                
        });

    }
}
