<?php
namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class OrderExport implements FromCollection,WithHeadings, WithMapping
{
   
    protected $dates;
    public function __construct()
    {
        
    }

    public function collection()
    {
        return Order::with('customer')->get();
    }

    public function map($order) : array {
        return [            
            $order->id,
            $order->customer->first_name ." ".$order->customer->last_name,
            $order->customer->postcode,
            $order->customer->address,
            $order->customer->phone_no,
            $order->customer->email,
            \Carbon\Carbon::parse($order->collection_date)->toDateString(),
            $order->collection_time,
            \Carbon\Carbon::parse($order->delivery_date)->toDateString(),
            $order->delivery_time,
            $order->instruction,
            $order->infomation,
            $order->frequency,
        ] ;
 
 
    }
    public function headings(): array
    {
        return [
            "Order ID", 
            "Customer",
            "Postcode",
            "Address",
            "Phone",
            "Email",
            "Collection Date",
            "Collection Time",
            "Delivery Date",
            "Delivery Time",
            "instruction",
            "information",
            "frequney",
        ];
    }
}