<?php

namespace App\Exports;

use App\BookingProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BookingProduct::all();
    }
}
