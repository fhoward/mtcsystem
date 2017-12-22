<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501464845UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'first_name')) {
                $table->dropColumn('first_name');
            }
            if(Schema::hasColumn('users', 'last_name')) {
                $table->dropColumn('last_name');
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
        Schema::table('users', function (Blueprint $table) {
                        $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                
        });

    }
}
