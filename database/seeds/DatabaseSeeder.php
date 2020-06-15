<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #Array of given data for states
        $states = [
            ['name' => 'North Carolina', 'abbreviation' => 'NC'],
            ['name' => 'California', 'abbreviation' => 'CA']
        ];

        #Array of given data for counties/cities
        $counties_cities = [
            ['county_name' => 'Brunswick',
                'zip' => '28461',
                'city_name' => 'Oak Island',
                'state_id' => 1],
            ['county_name' => 'Brunswick',
                'zip' => '28461',
                'city_name' => 'Southport',
                'state_id' => 1],
            ['county_name' => 'Brunswick',
                'zip' => '28461',
                'city_name' => 'Saint James',
                'state_id' => 1],
            ['county_name' => 'Alamance',
                'zip' => '27215',
                'city_name' => 'Burlington',
                'state_id' => 1],
            ['county_name' => 'Altamahaw',
                'zip' => '27202',
                'city_name' => 'Burlington',
                'state_id' => 1],
            ['county_name' => 'New Hanover',
                'zip' => '28428',
                'city_name' => 'Carolina Beach',
                'state_id' => 1],
            ['county_name' => 'Orange',
                'zip' => '92850',
                'city_name' => 'Anaheim',
                'state_id' => 2]
        ];

        #Adds each state to states table
        foreach($states as $state){
            DB::table('states')->insert($state);
        }

        #Adds each county/city to counties_cities table
        foreach($counties_cities as $county_city){
            DB::table('counties_cities')->insert($county_city);
        }

        echo "Seeding Complete.";

    }
}
