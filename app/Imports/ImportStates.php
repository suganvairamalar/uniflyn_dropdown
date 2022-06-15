<?php

namespace App\Imports;

use App\State;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStates implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new State([
            'state_name' => @$row[1],
            'country_id' => @$row[2]
        ]);
    }
}
