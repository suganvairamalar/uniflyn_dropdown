<?php

namespace App\Exports;

use App\State;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStates implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return State::all();
        return State::query()->get(['id','state_name', 'country_id']);
    }
}
