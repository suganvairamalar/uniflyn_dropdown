<?php

namespace App\Imports;

use App\Country;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCountries implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     public function model(array $row)
    {
        return new Country([                      
            'short_name'     => @$row[1],
            'country_name'   => @$row[2], 
            'phone_code'     => @$row[3]
        ]);
    }
}
