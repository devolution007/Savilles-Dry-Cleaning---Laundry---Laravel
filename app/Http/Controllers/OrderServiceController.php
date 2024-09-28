<?php

namespace App\Http\Controllers;

use App\Models\OrderService;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function edit($orderId)
    {
        return view('dashboard.form.editOrderServices', [
            'orderId' => $orderId,
            'services' => Service::where('status', 1)->get(),
            'orderServices' => OrderService::where('order_id', $orderId)->get(),
            'path' => route('order-services.update', $orderId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderService $orderService)
    {
        $values = $request->validate([
            "order_id" => ['required'],
            "services" => ['required'],
        ]);

        // delete current selected rows
        OrderService::where('order_id', $values['order_id'])->delete();

        // update new service items
        $orderServices = [];
        if(isset($values['services']) && !empty($values['services'])) {
            foreach($values['services'] as $service) {
                $orderServices[] = array(
                    'order_id' => $values['order_id'],
                    'service' => $service,
                );
            }
        }
        OrderService::upsert($orderServices, ['order_id', 'service']);

        return redirect()->route('orders.index')->with('success', 'Order Services Updated Successfully!');
    }
    
}
