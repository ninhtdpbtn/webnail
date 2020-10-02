<?php

namespace App\Exports;

use App\BookingProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExportDoanhThu implements FromCollection,WithHeadings
{
    private $a;
    private $b;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($a,$b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function collection()
    {
        $summaryPerDay = BookingProduct::query()
            ->tonghop($this->a, $this->b)
            ->get();
        return $summaryPerDay;
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return ["Ngày", "Doanh thu","Đơn"];
    }
}
