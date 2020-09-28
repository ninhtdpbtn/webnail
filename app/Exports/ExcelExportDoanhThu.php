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
        for ($i =$this->a ; $i <= $this->b ; $i++)
        {
//            echo "$i <br>";
            $booking[$i] = DB::table('booking_product')
                ->join('product','booking_product.id_product','=','product.id_product')
                ->join('booking','booking_product.id_booking','=','booking.id_booking')
                ->whereDate('booking.created_at','=',$i)
                ->select('booking.created_at','price')
                ->get();
        }

        $summaryPerDay = [];
        foreach ($booking as $date => $value){
            if ($value->count() > 0) {
                $price = 0;
                foreach ($value as $data){
                    $price += $data->price;
                }
                    $summaryPerDay[] =[
                        'date' => $date,
                        'price' => $price
                    ];

            }
        }
        return collect($summaryPerDay);
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return ["Ngày", "Doanh thu"];
    }
}
