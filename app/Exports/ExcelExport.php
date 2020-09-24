<?php

namespace App\Exports;

use App\BookingProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection,WithHeadings
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
        return DB::table('booking_product')
            ->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking.created_at','>=',$this->a)
            ->where('booking.created_at','<=',$this->b)
            ->select('name_booking','phone_booking','email_booking','name_product','description_booking','price','status_booking_product')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ["Tên người đặt","Số điện thoại", "Email", "Tên sản phẩm","Yêu cầu đặc biệt","Giá", "Trạng thái"];
    }
}
