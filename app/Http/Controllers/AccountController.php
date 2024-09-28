<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function myAccount()
    {

        $orders = [];
        if (auth()->user()->customer) {
            $orders = Order::with(['sections' => function ($q) {
                return $q->with('sectionName:id,name');
            }])->where('customer_id', auth()->user()->customer->id)->get();
        }

        $customer = Customer::where('user_id', auth()->id())->first();
        $card = null;
        $cardNumber = null;
        if ($customer) {
            $card = json_decode($customer->card_details);
            $cardNumber = json_decode($customer->cards);

            // $stripe = new \Stripe\StripeClient(
            //     env('STRIPE_SECRET_KEY')
            // );
            // $card =  $stripe->paymentMethods->all([
            //     'customer' => $card->id,
            //     'type' => 'card',
            // ]);
        }
        return view('account', compact('card', 'cardNumber', 'orders'));
    }

    public function cancel(Order $order)
    {
        if ($order->customer->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized' . $order->customer_id .',,,, '. auth()->id()  ], 403);
        }

        if ($order->status == 'cancelled') {
            return response()->json(['error' => 'Order is already cancelled.'], 400);
        }

        $collectionDate = Carbon::parse($order->collection_date);
        if (Carbon::now()->gte($collectionDate)) {
            return response()->json(['error' => 'Cannot cancel. Collection date has already passed.'], 400);
        }

        $order->status = 'cancelled';
        $order->save();

        return response()->json(['message' => 'Order cancelled successfully.'], 200);
    }


    public function contactDetails(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required',
            'name' => 'required|max:255',
            'user_type' => 'required|in:individual,company',
        ]);

        try {
            $user = User::find(auth()->id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $customer = Customer::where('user_id', auth()->id())->first();
            if (empty($customer)) {
                $customer =  new Customer();
                $customer->user_id = auth()->id();
            }

            $customer->user_type = $request->user_type;
            $customer->phone_no = $request->phone;
            $customer->save();

            $response = true;
        } catch (\Exception $e) {

            $response = false;
        }
        return response()->json(['success' => $response]);
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:6|max:10|different:old_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        try {
            $user = User::find(auth()->id());
            $user->password = bcrypt($request->new_password);
            $user->save();



            $response = true;
        } catch (\Exception $e) {
            $response = false;
        }
        return response()->json(['success' => $response]);
    }

    public function addCard(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));


        if (!isset($request->stripeToken)) {
            return response()->json(['success' => false, 'message' => 'Failed to initialize Stripe token. Please try again.']);
        }

        try {
            $stripeCustomer = Customer::where(['user_id' => auth()->user()->id])->whereNotNull(['card_details'])->first();
            if(!empty($stripeCustomer)){
                $stripeCustomerId = json_decode($stripeCustomer->card_details);
                // Create the new card for the customer
                $card = \Stripe\Customer::createSource(
                    $stripeCustomerId->id,
                    ['source' => $request->stripeToken]
                );

                // You can optionally set the default card for the customer
                $newCard = \Stripe\Customer::update(
                    $stripeCustomerId->id,
                    ['default_source' => $card->id]
                );

                $response = $response = Http::withBasicAuth(env('STRIPE_SECRET_KEY'), '')
                ->get('https://api.stripe.com/v1/customers/' . $newCard->id . '/cards/' . $newCard->default_source . '');
                $card = json_decode($response);

                Customer::where(['id' => $stripeCustomer->id])->update(['card_details' => json_encode($newCard), 'cards' => json_encode($card)]);
            }else{
                $stripe_customer = Stripe\Customer::create(array(
                    "name" => auth()->user()->name,
                    "email" => auth()->user()->email,
                    "source" => $request->stripeToken
                ));

                $response = $response = Http::withBasicAuth(env('STRIPE_SECRET_KEY'), '')
                ->get('https://api.stripe.com/v1/customers/' . $stripe_customer->id . '/cards/' . $stripe_customer->default_source . '');

                $card = json_decode($response);

                $customer = Customer::where('user_id', auth()->id())->first();
                if (empty($customer)) {
                    $customer =  new Customer();
                    $customer->user_id = auth()->id();
                }
                $customer->card_details = json_encode($stripe_customer);
                $customer->cards = json_encode($card);
                $customer->save();
            }


            return response()->json(['success' => true, 'message' => 'Added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to initialize Stripe token. Please try again.']);
        }
    }

    public function addAddress(Request $request)
    {
        $data = $request->validate([
            'postcode' => 'required',
            'address' => 'required|max:500',
            'address1' => 'nullable|max:500',
        ]);

        try {

            $customer = Customer::where('user_id', auth()->id())->first();
            if (empty($customer)) {
                $customer =  new Customer();
                $customer->user_id = auth()->id();
            }
            $customer->postcode = $request->postcode;
            $customer->address = $request->address;
            $customer->address_1 = $request->address1;
            $customer->save();

            $response = true;
        } catch (\Exception $e) {
            $response = false;
        }
        return response()->json(['success' => $response]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function applePay()
    {
        return view('checkout.apple_pay');
    }
}
