<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SwitchTiming;
use Illuminate\Http\Request;

class SwitchTimingController extends Controller
{
    public function index()
    {     
        $switch = SwitchTiming::first();
        return view('admin.switch_timing.index',compact('switch'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'switch' => 'required|in:yes,no'
        ]);
   

        try{
            \DB::beginTransaction();
            
            $switch = SwitchTiming::first();
            if(!$switch)
            {
                $switch  =  new SwitchTiming();
            }
            $switch->switch = $request->switch;
            $switch->save();
           
            $msg = "Successfully Saved!";    
            \DB::commit();    
            return back()->with(['success'=>true,'message'=>$msg]);
        }catch(\Exception $e){
         
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
                return back()->with(['success'=>false,'message'=>$msg]);
        }

    }
}
