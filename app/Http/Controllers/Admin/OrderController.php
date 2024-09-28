<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Section;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Exports\OrderExport;
use App\Models\Customer;
use App\Models\OrderService;
use App\Models\User;
use Stripe\PaymentIntent;

use App\Models\offDays;
use App\Models\SwitchTiming;
use App\Models\Timing;

use Excel;
use Illuminate\Support\Facades\Mail;
use Stripe;
use PDF;
use Dompdf\Dompdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allOrders(Request $request)
    {

        $data = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'u.email',
            'c.address',
            'c.address_1',
            'c.city',
            'c.postcode',
            'c.phone_no',
            'orders.created_at',
            'orders.no',
            'orders.collection_date',
            'orders.collection_time',
            'orders.delivery_date',
            'orders.delivery_time',
            'orders.status',
            'orders.payment_status',
        );
        $getOrders = $data->get();

        $lable = "All";
        return view('admin.orders.all', compact('getOrders', 'lable'));
    }

    public function todayOrders(Request $request)
    {

        $data = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['status' => 'pending']);
        $data->whereDate('orders.created_at', '>=', date('Y-m-d'))->whereDate('orders.created_at', '<=', date('Y-m-d'));
        $getOrders = $data->get();

        $lable = "Today's";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function pendingOrders()
    {

        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.updated_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['payment_status' => 'paid', 'status' => 'pending'])->get();
        $lable = "Pending";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function onGoingOrders()
    {

        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.updated_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['status' => 'ongoing'])->get();
        $lable = "On Going";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function onTheWayOrders()
    {
        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.updated_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['status' => 'ontheway'])->get();
        $lable = "On The Way";


        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function delivered()
    {
        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.updated_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['status' => 'delivered'])->get();
        $lable = "Delivered";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function completedOrders()
    {

        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['payment_status' => 'paid', 'status' => 'complete'])->get();
        $lable = "Completed";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    public function notCompletedOrders()
    {

        $getOrders = Order::leftJoin('customers as c', 'orders.customer_id', '=', 'c.id')
        ->leftjoin('users as u', 'u.id', '=', 'c.user_id')
        ->select(
            'orders.id',
            'u.name as name',
            'orders.created_at',
            'orders.no',
            'orders.collection_date',
            'orders.delivery_date',
            'orders.status',
            'orders.payment_status',
        )->where(['status' => 'uncompleted'])->get();
        $lable = "Not Completed";
        return view('admin.orders.today', compact('getOrders', 'lable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('')) {
            abort(403);
        }
        $msg = '';
        try {
            \DB::beginTransaction();
            $order = new Order;
            $order->column = $request->column;
            $order->save();
            $msg = "Successfully Saved!";
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
        }

        return redirect()->route('.index')->with('message', $msg);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $setions = Section::has('services')->with('services')->get();
        $services = OrderService::with('service')->where('order_id', $order->id)->get();
        $totalOrders = Order::where('customer_id', $order->customer_id)->count();

        $offdays = offDays::pluck('day')->toArray();
        $offdates = offDays::where("day", '!=', "")->pluck('day')->toArray();
        $switchTimings = SwitchTiming::first();
        $timings = Timing::all();

        return view('admin.orders.details', compact('setions', 'order', 'services', 'totalOrders', 'offdays', 'offdates', 'switchTimings', 'timings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // if(!auth()->user()->can('')){
        //     abort(403);
        // }

        $setions = Section::has('services')->with('services')->get();
        $services = OrderService::with('service')->where('order_id', $order->id)->get();

        return view('admin.orders.edit', compact('setions', 'order', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function processed(Request $request, Order $order)
    {

        $order->status = "processed";
        $order->proceed_at = date('Y-m-d H:i:s');;
        $order->save();

        $customer = Customer::find($order->customer_id);
        $user = User::where(['id' => $customer->user_id])->first();

        // Mail::send('email.processed', array(
        //     'customer' => $customer->toArray(),
        //     'order' => $order->toArray(),
        //     'user' => $customer->user
        // ), function ($sending) use ($customer) {
        //     $sending->to($customer->user->email)->subject('Order Update and Acknowledge Order Processed - Savilles Dry Cleaning & Laundry');
        // });

        $msg = "Successfully " . $request->status;

        return back()->with(['success' => true, 'message' => $msg]);

    }

    public function collected(Request $request, Order $order)
    {

        $customer = Customer::find($order->customer_id);
        $user = User::where(['id' => $customer->user_id])->first();

        $order->collected_at = date('Y-m-d H:i:s');
        $order->save();

        // Mail::send('email.acknowledge_collection', array(
        //     'customer' => $customer->toArray(),
        //     'order' => $order->toArray(),
        //     'user' => $customer->user,
        //     'dateOrdered' => $order->created_at->toDateString()

        // ), function ($sending) use ($customer) {
        //     $sending->to($customer->user->email)->subject('Order Update and Acknowledge Collection - Savilles Dry Cleaning & Laundry');
        // });

        $status = "success";
        $msg = "Successfully Acknowledged Collection";
        return back()->with(['success' => true, 'message' => $msg]);
    }

    public function completed(Request $request, Order $order)
    {
        $order->status = "completed";
        $order->save();
        $msg = "Successfully " . $request->status;
        return back()->with(['success' => true, 'message' => $msg]);
    }

    public function update(Request $request, Order $order)
    {
        
        $msg = '';
        $services = OrderService::with('service')->select('qty', 'service_id')->where('order_id', $order->id)->get();
        if (count($services) < 1) {
            return back()->with('error', 'Order does not have any service');
        }

        $totalAmount = 0;
        
        foreach ($services as $service) {
            $totalAmount += $service->service->price * $service->qty;
        }
        $customer = Customer::find($order->customer_id);
        $user = User::where(['id' => $customer->user_id])->first();
        try {
            \DB::beginTransaction();
            $cardDetails = json_decode($customer->card_details);
            // dd($cardDetails->id);

            if (!isset($cardDetails->id)) {
                $msg = "Something went wrong!";
                return back()->with(['error' => true, 'message' => $msg]);
            }

             // Set your secret key
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            
            if(!is_null($order->payment_id)){
                $paymentIntentId = $order->payment_id;
                $paymentMethodId = $order->payment_method_id;
                
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
                $stripe->paymentIntents->update($paymentIntentId,['amount' =>  $totalAmount * 100]);
                
                
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
                // Confirm the payment
                $paymentIntent->confirm(['payment_method' => $paymentMethodId]);
                
                // Capture the payment
                $charge = $paymentIntent->capture(); // Capture the payment
            }else{
                // Charge
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
                $charge = $stripe->paymentIntents->create([
                    'customer' => $cardDetails->id,
                    'currency' => 'GBP',
                    'amount' =>  $totalAmount * 100,
                    'off_session' => true,
                    'payment_method_types' => ['card'],
                    'confirm' => true,
                    'description' => "Order from Website",
                    'source' => $cardDetails->default_source,
                    "shipping" => [
                        "name" => $user->name,
                        "phone" => $customer->phone_no,
                        'address' => [
                            'line1' => $customer->address . $customer->address_1 ?? '',
                            'postal_code' => $customer->postcode,
                            'city' => 'San Francisco',
                            'state' => 'CA',
                            'country' => 'US',
                        ],
                    ]
                ]);
            }
            // $charge = $stripe->paymentIntents->create([
            //     'customer' => $cardDetails->customer,
            //     'currency' => 'GBP',
            //     'amount' => $totalAmount * 100,
            //     'off_session' => true,
            //     'payment_method' => $cardDetails->id,
            //     'payment_method_types' => ['card'],
            //     'confirm' => true,
            //     'description' => "Order from Website",
            //     "shipping" => [
            //         "name" => $customer->first_name . ' ' . $customer->last_name,
            //         "phone" => $customer->phone_no,
            //         "address" => [
            //             "line1" => $customer->address,
            //             "line2" => $customer->address_1 ?? '',
            //             "postal_code" => $customer->postcode,
            //             "country" => "UK",
            //         ],
            //     ]
            // ]);

            // dd($charge);
            // $charge = Stripe\Charge::create([
            //     "amount" => $totalAmount * 100,
            //     "currency" => "GBP",
            //     "customer" => $cardDetails->customer,
            //     "description" => "Order from Website",
            //     "shipping" => [
            //         "name" => $customer->first_name . ' ' . $customer->last_name,
            //         "phone" => $customer->phone_no,
            //         "address" => [
            //             "line1" => $customer->address,
            //             "line2" => $customer->address_1 ?? '',
            //             "postal_code" => $customer->postcode,
            //             "country" => "UK",
            //         ],
            //     ]
            // ]);
            if ($charge->status == "succeeded") {
                $order->payment_status = "paid";
                $order->amount = $totalAmount;
                $order->token = \Str::random(10) . time() . $customer->id;
                $order->save();
                Mail::send('email.order', array(
                    'customer' => $customer->toArray(),
                    'order' => $order->toArray(),
                    'total' => $totalAmount,
                    'services' => $services,
                    'user' => $customer->user,
                    'dateOrdered' => $order->created_at->toDateString()

                ), function ($sending) use ($customer) {
                    $sending->to($customer->user->email)->subject('Order Update and Payment Confirmation - Savilles Dry Cleaning & Laundry');
                });
            }
            $status = "success";
            $msg = "Successfully Charged";
            \DB::commit();
            return back()->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            dd($e);
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with('error', $msg);
        }
    }

    public function completeOrder(Request $request, Order $order)
    {
        try {

            try {

                \DB::beginTransaction();

                \DB::beginTransaction();
                $order->status = $request->status;

                $order->status = $request->status;
                $order->proceed_at = date('Y-m-d H:i:s');;
                $order->save();

                if ($request->status == 'ontheway') {

                    $order->proceed_at = date('Y-m-d H:i:s');;
                    $order->save();

                    $userDetails = Customer::select('customers.*', 'users.*')
                    ->leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
                    ->leftJoin('users', 'customers.user_id', '=', 'users.id')
                    ->where('orders.customer_id', '=', $order->customer_id)
                    ->first();

                    Mail::send('email.dilevery', array(
                        'customer' => $userDetails->toArray(),
                        'order' => $order,

                    ), function ($sending) use ($userDetails) {
                        $sending->to($userDetails->email)->subject('Savilles Dry Cleaning & Laundry - Booking Delivery Details
                           ');
                    });

                    $order->proceed_at = date('Y-m-d H:i:s');;
                    $order->save();

                    $userDetails = Customer::select('customers.*', 'users.*')
                    ->leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
                    ->leftJoin('users', 'customers.user_id', '=', 'users.id')
                    ->where('orders.customer_id', '=', $order->customer_id)
                    ->first();

                    Mail::send('email.dilevery', array(
                        'customer' => $userDetails->toArray(),
                        'order' => $order,

                    ), function ($sending) use ($userDetails) {
                        $sending->to($userDetails->email)->subject('Savilles Dry Cleaning & Laundry - Booking Delivery Details
                           ');
                    });
                }


                if ($request->status == 'delivered') {

                    $userDetails = Customer::select('customers.*', 'users.*')
                    ->leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
                    ->leftJoin('users', 'customers.user_id', '=', 'users.id')
                    ->where('orders.customer_id', '=', $order->customer_id)
                    ->first();

                    $dompdf = new Dompdf();
                    $html = view('email.attechment', compact('userDetails', 'order'))->render();
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('A4', 'portrait');
                    $dompdf->render();
                // $dompdf->stream("invoice.pdf");
                    $pdfPath = public_path('pdfs/billing.pdf');
                    file_put_contents($pdfPath, $dompdf->output());
                    Mail::send('email.billing', [
                        'customer' => $userDetails->toArray(),
                        'order' => $order,
                    ], function ($sending) use ($userDetails, $pdfPath) {
                        $sending->to($userDetails->email)

                        ->subject('Savilles Dry Cleaning & Laundry - Booking Delivery Details')
                        ->attach($pdfPath, [
                            'as' => 'billing.pdf',
                            'mime' => 'application/pdf',
                        ]);
                    });

                // Remove the temporary PDF file
                    unlink($pdfPath);
                }

                $msg = "Successfully " . $request->status;
                \DB::commit();
                return back()->with(['success' => true, 'message' => $msg]);
            } catch (\Exception $e) {
                \DB::rollback();
                \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
                $msg = "Something went wrong!";
                return back()->with('error', $msg);
            }

            $msg = "Successfully " . $request->status;
            \DB::commit();
            return back()->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if (!auth()->user()->can('')) {
            abort(403);
        }
        $msg = '';
        try {
            \DB::beginTransaction();

            $order->delete();
            $msg = "Successfully Deleted";
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
        }
        return redirect()->route('.index')->with('message', $msg);
    }
    public function export(Request $request)
    {
        return Excel::download(new OrderExport, 'orders.csv');
    }

    public function updateServices_old(Request $request, Order $order)
    {
        $request->validate([
            'qty' => 'required|array',
            'qty.*' => 'required|numeric|gt:0'
        ]);

        try {
            \DB::beginTransaction();
            foreach ($request->qty as $key => $qty) {
                $service = new OrderService();
                $service->order_id = $order->id;
                $service->service_id = $key;
                $service->qty = $qty;
                $service->save();
            }
            $msg = "Successfully Added";
            \DB::commit();
            return back()->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with(['success' => false, 'message' => $msg]);
        }
    }

    public function updateServices(Request $request, Order $order)
    {
        $request->validate([
            'service_id' => 'required',
            'qty' => 'required|numeric'
        ]);

        try {

            \DB::beginTransaction();

            $service = new OrderService();
            $service->order_id = $order->id;
            $service->service_id = $request->service_id;
            $service->qty = $request->qty;
            $service->save();

            $msg = "Successfully Added";
            \DB::commit();
            return back()->with(['success' => true, 'message' => $msg]);

        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with(['success' => false, 'message' => $msg]);
        }
    }

    public function updateDate(Request $request, Order $order)
    {
        $data = $request->validate([
            'collection_time' => 'required',
            'collection_date' => 'required',
            'delivery_time' => 'required',
            'delivery_date' => 'required',
        ]);
        try {
            \DB::beginTransaction();
            $order->update($data);
            $msg = "Successfully Updated";
            \DB::commit();
            return back()->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with(['success' => false, 'message' => $msg]);
        }
    }

    public function chargeOrder(Request $request)
    {

        $data = $request->all();

        echo "<pre>";
        print_r($data);
        die;
    }

    public function cancelOrder(Request $request, Order $order)
    {
        $order->status = "cancelled";
        $order->save();
        $msg = "Successfully " . $request->status;
        return response()->json(['success' => true, 'message' => $msg]);
    }

    public function updateTimings(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validatedData = $request->validate([
            'collection_date' => 'required|date',
            'collection_time' => 'required',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required',
        ]);

        $order->update([
            'collection_date' => $validatedData['collection_date'],
            'collection_time' => $validatedData['collection_time'],
            'delivery_date' => $validatedData['delivery_date'],
            'delivery_time' => $validatedData['delivery_time'],
        ]);

        $msg = "Successfully updated.";
        return back()->with(['success' => true, 'message' => $msg]);
    }

}
