<?php

namespace App\Exports;

use App\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

//class ExportCountries implements FromCollection, WithHeadings
class ExportCountries implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function collection()
    {
        return Country::query()->get(['id','short_name', 'country_name','phone_code']);
    }

   
}
