<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501465887ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            if(Schema::hasColumn('contacts', 'date_assigned')) {
                $table->dropColumn('date_assigned');
            }
            
        });
Schema::table('contacts', function (Blueprint $table) {
            $table->string('date')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('date');
            
        });
Schema::table('contacts', function (Blueprint $table) {
                        $table->date('date_assigned')->nullable();
                
        });

    }
}
