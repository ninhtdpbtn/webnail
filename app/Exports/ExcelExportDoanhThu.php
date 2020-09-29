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
        $summaryPerDay = DB::table('booking_product')
            ->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product' ,'=',2)
            ->whereDate('booking.created_at' ,'>=',$this->a)
            ->whereDate('booking.created_at' ,'<=',$this->b)
            ->select(DB::raw("date(booking.created_at) as date"),DB::raw("SUM(price) as price"),DB::raw("COUNT(booking_product.id_product) as product"))
            ->groupBy(DB::raw("date(booking.created_at)"))
            ->get();
        return collect($summaryPerDay);
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return ["Ngày", "Doanh thu","Đơn"];
    }
}
