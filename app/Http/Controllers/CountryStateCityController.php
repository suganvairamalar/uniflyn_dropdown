<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Country;
use App\State;
use App\City;

class CountryStateCityController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["country_name","id"]);
        return view('country_state_city.country_state_city',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["state_name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["city_name","id"]);
        return response()->json($data);
    }
}
