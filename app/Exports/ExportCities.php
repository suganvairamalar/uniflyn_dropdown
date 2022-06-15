<?php

namespace App\Exports;

use App\City;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCities implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return City::all();
        return City::query()->get(['id','city_name', 'state_id']);
    }
}
