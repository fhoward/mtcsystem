<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1501465987ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            if(Schema::hasColumn('contacts', 'first_name')) {
                $table->dropColumn('first_name');
            }
            if(Schema::hasColumn('contacts', 'last_name')) {
                $table->dropColumn('last_name');
            }
            if(Schema::hasColumn('contacts', 'phone2')) {
                $table->dropColumn('phone2');
            }
            if(Schema::hasColumn('contacts', 'skype')) {
                $table->dropColumn('skype');
            }
            
        });
Schema::table('contacts', function (Blueprint $table) {
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
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('name');
            
        });
Schema::table('contacts', function (Blueprint $table) {
                        $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('phone2')->nullable();
                $table->string('skype')->nullable();
                
        });

    }
}
