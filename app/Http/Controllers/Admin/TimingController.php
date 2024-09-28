<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimingRequest;
use App\Models\Timing;
use DB;
use DataTables;
use Illuminate\Http\Request;
class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timings = Timing::all();
        return view('admin.timings.index',compact('timings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.timings.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimingRequest $request)
    {
        
        $msg = '';
        try{
            \DB::beginTransaction();
            $timing = new Timing;
            $timing->timing = $request->timing;
            $timing->save();
            $msg = "Timing Successfully Saved !!";    
            \DB::commit();  
             return redirect()->route('admin.timing.index')->with(['success'=>true,'message'=>$msg]);  
        }catch(\Exception $e){
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
            return back()->with(['success'=>false,'message'=>$msg]);
        }
       
      
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show(Timing $timing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function edit(Timing $timing)
    {
       
        return view('admin.timings.create_edit',compact('timing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timing $timing)
    {
        $msg = '';
        try{
            \DB::beginTransaction();
            $timing->timing = $request->timing;
            $timing->save();
            $msg = "Timing Successfully Updated !!";    
            \DB::commit();  
             return redirect()->route('admin.timing.index')->with(['success'=>true,'message'=>$msg]);  
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
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
         
        $msg = [];
        try{
            \DB::beginTransaction();
            
            $timing->delete();
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
