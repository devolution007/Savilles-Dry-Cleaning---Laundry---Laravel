<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderSection;
use App\Models\OrderService;
use App\Models\Payment;
use App\Models\Section;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function dashboard()
    {
        return view('dashboard.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.orders', [
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoice($slug)
    {
        $order = Order::with('customer')->where('token',$slug)->firstOrFail();
        $services = OrderService::with('service')->where('order_id',$order->id)->get();
        return view("invoice",compact('order','services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::where('id', $order->id)
        ->with('customer', 'payment', 'services')
        ->first();
        return view('dashboard.showOrder', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.form.editOrder', [
            'order' => $order,
            'path' => route('orders.update', $order->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $values = $request->validate([
            "collection_date" => ['required', 'date'],
            "collection_time" => ['required'],
            "delivery_date" => ['required', 'date'],
            "delivery_time" => ['required'],
            "instruction" => ['required'],
            "infomation" => ['nullable'],
            "frequency" => ['required'],
            "status" => ['required'],
        ]);

        $order->collection_date = $values['collection_date'];
        $order->collection_time = $values['collection_time'];
        $order->delivery_date = $values['delivery_date'];
        $order->delivery_time = $values['delivery_time'];
        $order->instruction = $values['instruction'];
        $order->infomation = $values['infomation'];
        $order->frequency = $values['frequency'];
        $order->status = $values['status'];
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Reservation Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function myOrders()
    {
        $sections = Section::has('services')->with('icon','tags')->get();
        $orders =[];
        if(auth()->user()->customer){
        $orders = Order::with(['sections'=>function($q){
            return $q->with('sectionName:id,name');
        }])->where('customer_id',auth()->user()->customer->id)->get();
        }
      
        return view('my_orders', ['sections' => $sections,'orders'=>$orders]);
    }
    

}
