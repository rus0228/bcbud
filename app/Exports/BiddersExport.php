<?php

namespace App\Exports;

use App\Models\Bidder;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiddersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bidder::all();
    }
}
