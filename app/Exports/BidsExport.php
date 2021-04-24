<?php

namespace App\Exports;

use App\Models\Bid;
use Maatwebsite\Excel\Concerns\FromCollection;

class BidsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bid::all();
    }
}
