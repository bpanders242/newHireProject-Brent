<?php

namespace App\Http\Controllers;

use App\County_City;
use App\State;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    #Controller function for displaying all states in table (/api/allStates)
    public function getAllStates(){
        $states = State::get();
        $respStr = '';
        foreach($states as $state){
            $respStr.= $state->toJson(JSON_PRETTY_PRINT);
            $respStr.= '<br>';
        }
        return response($respStr, 200);
    }

    #Controller function for displaying all counties/cities in table (/api/allCountiesCities)
    public function getAllCountiesCities(){
        $countiesCities = County_City::get();
        $respStr = '';
        foreach($countiesCities as $countyCity){
            $respStr.= $countyCity->toJson(JSON_PRETTY_PRINT);
            $respStr.= '<br>';
        }
        return response($respStr, 200);
    }

    #Controller function for building queries using Eloquent models and returning results (/api/results)
    public function getSearchResults(Request $request){

        $findState = $request->input('findState');
        $dropZip = $request ->input('dropZip');

        if(State::where('abbreviation', $findState)->exists()) {
            $state = State::where('abbreviation', $findState)->first();
            $stateId = $state->id;

            if(isset($dropZip)){
                $counties = County_City::select('county_name')
                    ->distinct()
                    ->where('state_id', $stateId)
                    ->where('zip', '!=', $dropZip)
                    ->get();
                $countyArray = [];

                if(count($counties) > 0){
                    foreach($counties as $county){
                        $cities = County_City::select('city_name', 'zip')
                            ->where('county_name', $county->county_name)
                            ->where('zip', '!=', $dropZip)
                            ->get();
                        $cityArray = ["Name"=>$county->county_name,"Cities"=>$cities];
                        array_push($countyArray, $cityArray);
                    }

                    $stateArray = ["State"=>$state->name, "Counties"=>$countyArray];
                    $result = $stateArray;
                } else {
                    $result ="No cities were found outside of zip: ".$dropZip;
                    return response($result, 404);
                }

            } else {
                $counties = County_City::select('county_name')
                    ->distinct()
                    ->where('state_id', $stateId)
                    ->get();
                $countyArray = [];

                foreach($counties as $county){
                    $cities = County_City::select('city_name', 'zip')
                        ->where('county_name', $county->county_name)
                        ->get();
                    $cityArray = ["Name"=>$county->county_name,"Cities"=>$cities];
                    array_push($countyArray, $cityArray);
                }

                $stateArray = ["State"=>$state->name, "Counties"=>$countyArray];
                $result = $stateArray;
            }


        } else {
            $result ="No states were found with abbreviation: ".$findState;
            return response($result, 404);
        }

        return response($result, 200);
    }
}

