<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.form.editCustomer', [
            'customer' => $customer,
            'path' => route('customers.update', $customer->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $values = $request->validate([
            "user_type" => ['required'],
            "first_name" => ['required', 'max:255'],
            "last_name" => ['required', 'max:255'],
            "phone_no" => ['required'],
            "email" => ['required', 'email', 'max:255'],
            "address" => ['required'],
            "address_1" => ['nullable'],
            "city" => ['nullable'],
            "postcode" => ['required', 'max:255'],
        ]);

        $customer->email = $values['email'];
        $customer->user_type = $values['user_type'];
        $customer->first_name = $values['first_name'];
        $customer->last_name = $values['last_name'];
        $customer->phone_no = $values['phone_no'];
        $customer->address = $values['address'];
        $customer->address_1 = $values['address_1'];
        //$customer->city = $values['city'];
        $customer->postcode = $values['postcode'];
        $customer->save();

        return redirect()->route('orders.index')->with('success', 'Customer Details Updated Successfully!');
    }

}
