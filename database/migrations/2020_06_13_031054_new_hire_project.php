<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NewHireProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #Build states table
        Schema::create('states', function(Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('abbreviation', 2);
        });

        #Build counties_cities table
        Schema::create('counties_cities', function(Blueprint $table) {
            $table->id();
            $table->string('county_name', 120);
            $table->string('zip', 10);
            $table->string('city_name', 120);
            $table->foreignId('state_id');
        });

        #Seed database
        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

