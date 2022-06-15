<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ImportCountries;
use App\Exports\ExportCountries;
use App\Imports\ImportStates;
use App\Exports\ExportStates;
use App\Imports\ImportCities;
use App\Exports\ExportCities;

use App\Country;
use App\State;
use App\City;

use Maatwebsite\Excel\Facades\Excel;


class ImportExcelController extends Controller
{
     public function country_index()
    {
        //dd("Hi");

        //$countries = Country::all();
        $countries = Country::orderBy('short_name')
                        ->paginate(10);
                        //dd($countries);
        return view('country_import_excel.index',compact('countries'));

    }
    public function country_import(Request $request)
    {
        $request->validate([
            'country_import_file' => 'required|mimes:xls,xlsx,csv'
        ]);


       
        Excel::import(new ImportCountries, request()->file('country_import_file'));
        return back()->with('success', 'Countries imported successfully.');
    }

    public function country_export() 
    {
        return Excel::download(new ExportCountries, 'countries.xlsx');
    }

    public function state_index()
    {
       $states = State::orderBy('id')
                        ->paginate(10);
        return view('state_import_excel.index',compact('states'));

    }   
    public function state_import(Request $request)
    {
        $request->validate([
            'state_import_file' => 'required'
        ]);
        Excel::import(new ImportStates, request()->file('state_import_file'));
        return back()->with('success', 'States imported successfully.');
    }

    public function state_export() 
    {
        return Excel::download(new ExportStates, 'states.xlsx');
    }

    public function city_index()
    {
       $cities = City::orderBy('id')
                        ->paginate(10);
        return view('city_import_excel.index',compact('cities'));

    }   
    public function city_import(Request $request)
    {
        $request->validate([
            'city_import_file' => 'required'
        ]);
        Excel::import(new ImportCities, request()->file('city_import_file'));
        return back()->with('success', 'Cities imported successfully.');
    }

    public function city_export() 
    {
        return Excel::download(new ExportCities, 'cities.xlsx');
    }
}
