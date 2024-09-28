<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\offDays;
use App\Models\Order;

use App\Models\OrderService;
use App\Models\OrderSection;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PostCode;
use Stripe;
use App\Models\Section;
use App\Models\SwitchTiming;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\View;
// Use Stripe PHP library with alias to avoid name conflict
use Stripe\Stripe as StripeClient;
use Stripe\PaymentIntent;


class CheckoutController extends Controller
{
    //--------pyment--intent--------------------
    public function createPaymentIntent(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production!
        StripeClient::setApiKey(env('STRIPE_SECRET_KEY'));
        
        $amount = $request->input('amount', 0.30 * 100);

        // Create a PaymentIntent with the order amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => (int) $amount, // Amount in pence (GBP)
            'currency' => 'gbp',
            'payment_method_types' => ['card'],
            'capture_method' => 'manual',
            'setup_future_usage' => 'off_session',
            'confirm' => false
        ]);
        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
            'paymentIntentId' => $paymentIntent->id
        ]);
    }

    
    
    /* --------------------------------------------------
    | Checkout : First Step
    -------------------------------------------------- */

    public function getCheckoutStep01(Request $request)
    {
        if (isset(Auth::user()->id) && Auth::user()->id) {
            $customer = Customer::where('user_id', auth()->id())->first();
            $card = null;
            if ($customer) {
                $card = json_decode($customer->card_details);
            }
            if (empty($card)) {
                return redirect()->route('account')->with('danger', 'Failed to initialize Stripe token. Please try again.');
            }

            // dd(3);
            // session()->flush();
            $customer = $request->session()->get('details');

            // today order count
            $orderCount = Order::whereDate('created_at', Carbon::today())->count();

            if ($orderCount > 20) {
                return view('checkout.closed');
            } else {
                return view('checkout.details', [
                    'customer' => $customer,
                ]);
            }
        } else {
            return view('checkout.details');
        }
    }


    public function checkPostcodeExistence(Request $request)
    {
        $user_input = $request->postcode;
        $potalcode = substr($user_input, 0, 4);
        $checkPost_code = PostCode::where("code", $potalcode)->first();
        if (isset($checkPost_code) && $checkPost_code != null) {
            return 'exists';
        } else {
            return 'notExist';
        }
    }

    public function postCheckoutStep01(Request $request)
    {
        $validatedData = $request->validate([
            "user_type" => ['required', 'max:255'],
            "name" => ['required', 'max:255'],
            "phone_no" => ['required', 'max:255'],
            "email" => ['required', 'email', 'max:255'],
            "address" => ['required', 'max:500'],
            "address_1" => ['nullable', 'max:500'],
            "postcode" => ['required', 'max:255'],
        ], [
            'user_type.required' => 'Please select your user type.',
            'name.required' => 'Please fill your first name.',
            'phone_no.required' => 'Please fill your phone number.',
            'email.required' => 'Please fill your email address.',
            'email.email' => 'Please fill a valid email address.',
            'address.required' => 'Please fill your first line of address.',
            'postcode.required' => 'Please fill your postcode.',
        ]);
        // dd($request->postcode);
        $user_input = $request->postcode;
        $potalcodeS = substr($user_input, 0, 4);
        $checkPost_code = PostCode::where("code", $potalcodeS)->first();

        if (isset($checkPost_code) && $checkPost_code != null) {
        } else {
            return redirect()->back()->with('error', 'The provided postal code does not exist.');
        }

        $password = null;
        if (Auth::user() == null) {
            // if($request->email){
            $checkEmail = User::where('email', $request->email)->first();

            // if ($checkEmail != null) {
            //     return redirect()->back()->with('error', 'This email already register');
            // }
            // }

            $data = $request->validate([
                'email' => 'required|email|max:255',
                'name' => 'required|max:255',
            ]);
            // dd($data);
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
            $password = '';
            $length = 12;
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            $data['password'] = bcrypt($password);

            if (!isset($checkEmail)) {

                $user = User::create($data);

                Mail::send('inc.login_details', ['email' => $user->email, 'password' => $password], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Login Details');
                });
            } else {
                $user = User::where('email', $request->email)->first();
            }
            // if (empty($request->session()->get('details'))) {
            //     $customer = new Customer();
            // } else {
            //     $customer = $request->session()->get('details');
            // }
            // $customer->fill($validatedData);
            // $request->session()->put('details', $customer);
        }

        if (Auth::check()) {
            $customer = Customer::where(['user_id' => Auth::user()->id])->first();
            $user = User::where(['id' => Auth::user()->id])->first();
        } else {
            $customer = Customer::where(['user_id' => $user->id])->first();
        }
        if (empty($customer)) {
            $customer = new Customer();
            $customer->user_id  = $user->id;
            $customer->phone_no  = $request->phone_no;
            $customer->address  = $request->address;
            $customer->address_1 = $request->address_1;
            $customer->user_type =  $request->user_type;
            $customer->postcode =  $request->postcode;
            $customer->save();
        } else {
            $customer->address  = $request->address;
            $customer->address_1 = $request->address_1;
            $customer->postcode =  $request->postcode;
            $customer->save();
        }

        if (isset($password) && $password != null) {
            $userDetails = [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                // Add any other user details you need
            ];
            if (!isset($checkEmail)) {
                Session::flash('success', 'Your account has been created. Please check your email for login details.');
            }
            Session::put('user', $userDetails);
            Session::put('userDetails', $userDetails);
        }
        return redirect()->route('checkout.get.step02');
    }

    /* --------------------------------------------------
    | Checkout : Second Step
    -------------------------------------------------- */

    public function getCheckoutStep02(Request $request)
    {
        $order = $request->session()->get('reservation');

        $offdays = offDays::pluck('day')->toArray();

        $offdates = offDays::where("day", '!=', "")->pluck('day')->toArray();
        // dd($offdates);
        $switchTimings = SwitchTiming::first();
        $timings = Timing::all();
        return view('checkout.reservation', [
            'order' => $order,
            'offdays' => $offdays,
            'offdates' => $offdates,
            'switchTimings' => $switchTimings,
            'timings' => $timings
        ]);
    }

    public function postCheckoutStep02(Request $request)
    {
        $validatedData = $request->validate([
            "collection_date" => ['required', 'date'],
            "collection_time" => ['nullable', 'max:255'],
            "delivery_date" => ['required', 'date'],
            "delivery_time" => ['nullable', 'max:255'],
            "instruction" => ['required'],
            "infomation" => ['nullable'],
            "frequency" => ['required'],
        ], [
            'collection_date.required' => 'Please select a day to collection.',
            'collection_date.date' => 'Please select a valid day to collection.',
            'collection_time.required' => 'Please select a time to collection.',
            'delivery_date.required' => 'Please select a day to delivery.',
            'delivery_date.date' => 'Please select a valid day to delivery.',
            'delivery_time.required' => 'Please select a time to delivery.',
            'instruction.required' => 'Please select driver instruction.',
            'frequency.required' => 'Please select frequency.',
        ]);

        if (empty($request->session()->get('reservation'))) {
            $order = new Order();
        } else {
            $order = $request->session()->get('reservation');
        }
        $order->fill($validatedData);
        $request->session()->put('reservation', $order);

        return redirect()->route('checkout.get.step04');
    }

    /* --------------------------------------------------
    | Checkout : Third Step
    -------------------------------------------------- */

    public function getCheckoutStep03(Request $request)
    {
        if (empty($request->session()->get('reservation'))) {
            return redirect()->route('checkout.get.step02');
        }

        $order = $request->session()->get('reservation');
        $services = $request->session()->get('services');

        $sections = Section::has('services')->with('icon', 'tags')->withSum('services', 'price')->get();

        return view('checkout.services', [
            'order' => $order,
            'services' => $services,
            'sections' => $sections
        ]);
    }

    public function postCheckoutStep03(Request $request)
    {
        $validatedData = $request->validate([
            "services" => ['required'],
        ], [
            'services.required' => 'Please select one service at least.'
        ]);

        $fillData = [];
        $products = [];
        foreach ($validatedData['services'] as $serviceItem) {
            $fillData[] = $serviceItem;
            $products[] = Section::findOrFail($serviceItem);
        }
        $request->session()->put('services', $fillData);
        $request->session()->put('products', $products);

        if (!empty(auth()->user()->customer->card_details)) {
            $order = $request->session()->get('reservation');

            $order->customer_id = auth()->user()->customer->id ?? null;
            $order->save();

            $order->no = 'sav' . $order->id;
            $order->save();


            $customer = Customer::where('id', $order->customer_id)->first();
            $services = OrderService::where('order_id', $order->id)->get();
            $request->session()->forget('order_id');
            $products = $request->session()->get('products');
            $services = OrderService::with('service')->select('qty', 'service_id')->where('order_id', $order->id)->get();

            // $this->sendEmail($customer,$order,$services);

            // return view('checkout.summary', [
            //     'order' => $order ?? '',
            //     'customer' => $customer ?? '',
            //     'services' => $services ?? '',
            //     'products' => $products ?? ''
            // ]);

        }
        return redirect()->route('checkout.get.step04');
        // return redirect()->route('checkout.get.step05')->with('success', 'Your Reservation Received Successfully!');
    }

    /* --------------------------------------------------
    | Checkout : Fourth Step
    -------------------------------------------------- */

    public function getCheckoutStep04(Request $request)
    {
        if (empty($request->session()->get('reservation'))) {
            return redirect()->route('checkout.get.step02');
        }

        // if (empty($request->session()->get('services'))) {
        //     return redirect()->route('checkout.get.step03');
        // }

        $order = $request->session()->get('reservation');
        // $services = $request->session()->get('services');
        $products = $request->session()->get('products');
        $user = $request->session()->get('user');
        // dd($user);
        $card = null;
        // if (isset(Auth::user()->id)) {
        //    $customer = Customer::where('user_id', auth()->id())->whereNotNull('card_details')->whereNotNull('cards')->first();
       //    } else {
        //    $customer = Customer::where('user_id', $user['id'])->whereNotNull('card_details')->whereNotNull('cards')->first();
    //    }
    
        if (Auth::check()) {
            $customer = Customer::where('user_id', auth()->id())
                                ->whereNotNull('card_details')
                                ->whereNotNull('cards')
                                ->first();
        } elseif (isset($user['id'])) {
            $customer = Customer::where('user_id', $user['id'])
                                ->whereNotNull('card_details')
                                ->whereNotNull('cards')
                                ->first();
        } else {
            $customer = null;
        }

        if (empty($customer)) {
            $card = null;
        } else {
            $card = json_decode($customer->cards);
        }

        return view('checkout.payment', [
            'order' => $order,
            // 'services' => $services,
            'products' => $products,
            'card' => $card
        ]);
    }

    public function postCheckoutStep04(Request $request)
    {

        try {

            $data = $request->all();

            if(Auth::check()) {
                $userDetails = Auth::user();
            } else {
                $userDetails = session()->get('userDetails');
            }

            // Check if user details exist
            if ($userDetails) {
                // Access individual user details
                $userId = $userDetails['id'];
                $userEmail = $userDetails['email'];
                $userName = $userDetails['name'];

                // Do something with the user details

            }
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::where(['user_id' => $userId])->first();

            if (empty($customer->card_details)) {
                if (!isset($request->stripeToken)) {
                    return redirect()->route('checkout.get.step04')->with('danger', 'Failed to initialize Stripe token. Please try again.');
                }
            }

            if (Auth::user() == null) {
                if (empty($customer->card_details) && isset($request->stripeToken)) {
                    $stripe_customer = Stripe\Customer::create(array(
                        "name" => $userName,
                        "email" => $userEmail,
                        "source" => $request->stripeToken
                    ));
                    $response = $response = Http::withBasicAuth(env('STRIPE_SECRET_KEY'), '')
                    ->get('https://api.stripe.com/v1/customers/' . $stripe_customer->id . '/cards/' . $stripe_customer->default_source . '');

                    $card = json_decode($response);
                }
            } else {
                if (empty($customer->card_details) && isset($request->stripeToken)) {
                    $stripe_customer = Stripe\Customer::create(array(
                        "name" => auth()->user()->name,
                        "email" => $customer->email,
                        "source" => $request->stripeToken
                    ));
                    $response = $response = Http::withBasicAuth(env('STRIPE_SECRET_KEY'), '')
                    ->get('https://api.stripe.com/v1/customers/' . $stripe_customer->id . '/cards/' . $stripe_customer->default_source . '');

                    $card = json_decode($response);
                }
            }

            if (empty($customer->card_details)) {
                $customer->card_details = json_encode($stripe_customer);
                $customer->cards = json_encode($card);
                $customer->save();
            }
            // insert order data
            $order = $request->session()->get('reservation');

            if (Auth::user() == null) {
                $order->customer_id = $customer->id ?? null;
            } else {
                $order->customer_id = auth()->user()->customer->id ?? null;
            }
            $order->save();

            $order->no = 'sav' . $order->id;
            $order->save();


            $totalAmount = 0;
            // $services = session()->get('services');
            // foreach ($services as $service) {
            //     $orderService =  new OrderSection;
            //     $orderService->order_id =  $order->id;
            //     $orderService->section_id =  $service;
            //     $orderService->save();
            // }

            /* ---------------------------------------------
            |   Finalize
            | --------------------------------------------- */

            // clear steps data
            $request->session()->forget('details');
            $request->session()->forget('reservation');
            // $request->session()->forget('services');
            Session::forget('customer');

            // complete the checkout
            $request->session()->put('order_id', $order->id);
            // $services = OrderService::with('service')->select('qty', 'service_id')->where('order_id', $order->id)->get();
            $this->sendEmail($customer, $order, array(), $totalAmount);

            return redirect()->route('checkout.get.step05')->with('success', 'Your Reservation Received Successfully!');
        } catch (\Exception $e) {
            // return redirect()->route('checkout.get.step04')->with('danger', 'Failed to initialize Stripe customer. Please try again.');
            return redirect()->route('checkout.get.step02')->with('danger', $e);
        }
    }
    
    
/* --------------------------------------------------
    | Checkout : fourt Step card button
-------------------------------------------------- */

    public function postCheckoutStep04Button(Request $request)
    {
        try {
            $data = $request->all();
            $userDetails = Session::get('user');
            if(Auth::check()) {
                $userDetails = Auth::user();
            } else {
                $userDetails = session()->get('userDetails');
            }

            if (empty($userDetails)){
                 $request->session()->forget('details');
            $request->session()->forget('reservation');
            $request->session()->forget('services');
            Session::forget('customer');
            return redirect()->route('checkout')->with('danger', 'Failed to get your contact details.');
            };
            
            // Check if user details exist
            if ($userDetails) {
                // Access individual user details
                $userId = $userDetails['id'];
                $userEmail = $userDetails['email'];
                $userName = $userDetails['name'];
                
                // Do something with the user details
                
            }

            $customer = Customer::where(['user_id' => $userId])->first();

            // insert order data
            // dd($customer->id);
            $order = $request->session()->get('reservation');

            if (Auth::user() == null) {
                $order->customer_id = $customer->id ?? null;
            } else {
                $order->customer_id = auth()->user()->customer->id ?? null;
            }
            $order->payment_id=$request->paymentId;
            $order->payment_method_id=$request->paymentMethodId;
            $order->save();

            $order->no = 'sav' . $order->id;
            $order->save();


            $services = session()->get('services', []);
            $totalAmount = 0;
            foreach ($services as $service) {
                $orderService =  new OrderSection;
                $orderService->order_id =  $order->id;
                $orderService->section_id =  $service;
                $orderService->save();
            }

            /* ---------------------------------------------
            |   Finalize
            | --------------------------------------------- */

            // clear steps data
            $request->session()->forget('details');
            $request->session()->forget('reservation');
            $request->session()->forget('services');
            Session::forget('customer');

            // complete the checkout
            $request->session()->put('order_id', $order->id);
            $services = OrderService::with('service')->select('qty', 'service_id')->where('order_id', $order->id)->get();
            $this->sendEmail($customer, $order, $services, $totalAmount);

            return redirect()->route('checkout.get.step05')->with('success', 'Your Reservation Received Successfully!');
        } catch (\Exception $e) {
            return redirect()->route('checkout.get.step04')->with('danger', 'Failed to initialize Stripe customer. Please try again.');
            // return redirect()->route('checkout.get.step04')->with('danger', $e);
        }
    }


    /* --------------------------------------------------
    | Checkout : Fifth Step
    -------------------------------------------------- */

    public function getCheckoutStep05(Request $request)
    {
        if (empty($request->session()->get('order_id'))) {
            // die("Here");
            return redirect()->route('home');
        }

        $order_id = $request->session()->get('order_id');
        $order = Order::where('id', $order_id)->first();

        $customer = Customer::where('id', $order->customer_id)->first();

        $services = OrderService::where('order_id', $order->id)->get();
        $request->session()->forget('order_id');
        $products = $request->session()->get('products');
        $switchTimings = SwitchTiming::first();

        $userDetails = Session::get('user');

        // Check if user details exist
        if ($userDetails) {
            // Access individual user details
            $userId = $userDetails['id'];
            $userEmail = $userDetails['email'];
            $userName = $userDetails['name'];

            // Do something with the user details

        }
        if (Auth::user() == null) {
            $user = User::where('id', $userId)->first();
            return view('checkout.summary', [
                'user' => $user,
                'order' => $order ?? '',
                'customer' => $customer ?? '',
                'services' => $services ?? '',
                'products' => $products ?? '',
                'switchTimings' => $switchTimings ?? ''
            ]);
        } else {
            return view('checkout.summary', [
                'order' => $order ?? '',
                'customer' => $customer ?? '',
                'services' => $services ?? '',
                'products' => $products ?? '',
                'switchTimings' => $switchTimings ?? ''
            ]);
        }
    }
    public function checkPostCode(Request $request)
    {
        $request->validate(['code' => 'required']);
        $success = false;
        $code = PostCode::where('code', $request->code)->first();
        if (!empty($code)) {
            $success = true;
        }
        return response()->json(['success' => $success]);
    }

    public function sendEmail($customer, $order, $services, $totalAmount)
    {
        $userDetails = Session::get('user');

        // Check if user details exist
        if ($userDetails) {
            // Access individual user details
            $userId = $userDetails['id'];
            $userEmail = $userDetails['email'];
            $userName = $userDetails['name'];

            // Do something with the user details

        }
        // Mail::send('email.orderconfirm', array(
        //     'customer' => $customer->toArray(),
        //     'user' => auth()->user(),
        //     'order' => $order->toArray(),
        //     'services' => $services->toArray(),
        //     'total' => $totalAmount,
        //     'dateOrdered' => $order->created_at->toDateString()

        // ), function ($sending) use ($customer) {
        if (Auth::user() == null) {
            $user = User::where('id', $userId)->first();
            Mail::send('email.orderconfirm', array(
                'customer' => $customer->toArray(),
                'user' => $user,
                'order' => $order->toArray(),
                // 'services' => $services,
                'total' => $totalAmount,
                'dateOrdered' => $order->created_at->toDateString()

            ), function ($sending) use ($customer, $userEmail) {
                $sending->to($userEmail)->subject('Savilles Dry Cleaning & Laundry - Booking Confirmation
                 ');
            });

        } else {

            Mail::send('email.orderconfirm', array(
                'customer' => $customer->toArray(),
                'user' => auth()->user(),
                'order' => $order->toArray(),
                // 'services' => $services,
                'total' => $totalAmount,
                'dateOrdered' => $order->created_at->toDateString()

            ), function ($sending) use ($customer) {
                $sending->to(auth()->user()->email)->subject('Savilles Dry Cleaning & Laundry - Booking Confirmation
                 ');
            });
        }
    }

    public function deliveryDate(Request $request)
    {
        $date =  Carbon::parse($request->date)->addDays(2);

        $offdays = offDays::pluck('day')->toArray();
        return view('checkout.delivery_date', compact('date', 'offdays'));
    }

    public function getRegisterEmailData(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        $customer = Customer::where('user_id', $user->id)->first();

        $card = null;
        if ($customer) {
            $card = json_decode($customer->card_details);
        }
        if (empty($card)) {
            return redirect()->route('account')->with('danger', 'Failed to initialize Stripe token. Please try again.');
        }

        // dd(3);
        // session()->flush();
        // $customer = $request->session()->get('details');

        // today order count
        $orderCount = Order::whereDate('created_at', Carbon::today())->count();



        // if ($orderCount > 20) {
        //     return view('checkout.closed');
        // } else {
        //     return view('checkout.details', [
        //         'customer' => $customer,
        //     ]);
        // }

        if ($orderCount > 20) {

            return response()->json(['status' => 'closed', 'message' => 'Checkout is closed.']);
        } else {

            // $html = view('checkout.details', [
            //     'customer' => $customer,
            // ])->render();

            session(['last_visited_url' => 'checkout']);

            return response()->json([
                'status' => 'success',
                'customer' => $customer,
                'user' => $user,
                'is_loggedin' => (auth()->id()) ? true : false
            ]);
        }
    }

    public function getUpdateCardform(Request $request) {
        $html = View::make('checkout.updateCardform')->render();
        return response()->json(['html' => $html]);
    }

    public function updateCard(Request $request) {


        $userDetails = Auth::user();

        $userId = $userDetails['id'];
        $userEmail = $userDetails['email'];
        $userName = $userDetails['name'];

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $customer = Customer::where(['user_id' => $userId])->first();

        if (!isset($request->stripeToken)) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to initialize Stripe token. Please try again.'
            ]);
        } else {

            $stripe_customer = Stripe\Customer::create(array(
                "name" => auth()->user()->name,
                "email" => $customer->email,
                "source" => $request->stripeToken
            ));

            $response = $response = Http::withBasicAuth(env('STRIPE_SECRET_KEY'), '')->get('https://api.stripe.com/v1/customers/' . $stripe_customer->id . '/cards/' . $stripe_customer->default_source . '');

            $card = json_decode($response);

            if(!empty($card)) {
                $customer->card_details = json_encode($stripe_customer);
                $customer->cards = json_encode($card);
                $customer->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Successfully updated.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update card. Please try again. Thanks'
                ]);
            }

        }
    }
}
