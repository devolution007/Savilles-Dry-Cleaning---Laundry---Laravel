<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('user')->select('id','user_id','user_type','address','address_1','phone_no','postcode')->get();
        return view('admin.customer.index',compact('customers'));
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
        if(!auth()->user()->can('')){
            abort(403);
        }
        $msg = '';
        try{
            \DB::beginTransaction();
            $customer = new Customer;
            $customer->column = $request->column;
            $customer->save();
            $msg = "Successfully Saved!";    
            \DB::commit();  
             return redirect()->route('admin..index')->with(['success'=>true,'message'=>$msg]);  
        }catch(\Exception $e){
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
        }
       
        return redirect()->route('admin.index')->with('message',$msg);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $user = User::select('name','email')->find($customer->user_id);   
        return view('admin.customer.edit',compact('customer','user'));
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
        $msg = '';
        try{
            \DB::beginTransaction();      
            $customers = Customer::find($customer->id);      
            $customers->phone_no = $request->phone_no;
            $customers->postcode = $request->postcode;
            $customers->address = $request->address;
            $customers->address_1 = $request->address_1;
            $customers->save();

            $user = User::find($customer->user_id);           
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $msg = "Successfully Updated";    
            \DB::commit();    
            return redirect()->route('admin.customer.index')->with(['success'=>true,'message'=>$msg]);
        }catch(\Exception $e){
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
                return back()->with(['success'=>false,'message'=>$msg]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $msg = [];
        try{
            \DB::beginTransaction();
            
            $customer->delete();
            $msg = ["success"=>true,"message"=>"Successfully Deleted"];    
            \DB::commit();    
        }catch(\Exception $e){
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = ["success"=>false,"message"=>"Something went wrong!"];  
        }
        return response()->json($msg);
    }
}
