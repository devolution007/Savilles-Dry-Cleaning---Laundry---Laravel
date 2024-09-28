<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\offDays;
use Illuminate\Http\Request;

class offDaysController extends Controller
{
    public function index()
    {
     
        $days = offDays::all()->pluck('day')->toArray();
        $dated = offDays::all()->where('date','!=','')->toArray();
        return view('admin.days_off.index',compact('days','dated'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        offDays::truncate();
        $msg = '';
        try{
            \DB::beginTransaction();
            
            if(!empty($request->days))
            {
                foreach($request->days as $day)
                {
                    $offDay = new offDays();
                    $offDay->day = $day;
                    $offDay->save();
                }
            }

            if($request->dates != ""){
                $dates = explode(',', $request->dates);
               
                foreach($dates as $date)
                {
                    $offDay = new offDays();
                    $offDay->date = date('Y-m-d',strtotime($date));
                    $offDay->save();
                }
            }
         
           
            $msg = "Successfully Saved!";    
            \DB::commit();    
            return back()->with(['success'=>true,'message'=>$msg]);
        }catch(\Exception $e){
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
                return back()->with(['success'=>false,'message'=>$msg]);
        }
       
        
        //
    }

    public function delete($id){
        $msg = [];
        $datas = offDays::find($id);
        try{
            \DB::beginTransaction();            
            $datas->delete();
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
