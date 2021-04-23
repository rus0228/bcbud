<?php

namespace App\Imports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\ToModel;

class CarsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Car([
            'event'     => auth()->user()->event,
            'start_number'    => $row[0],
            'competitor_name' => $row[1],
            'car_brand' => $row[2]
        ]);
    }
}
