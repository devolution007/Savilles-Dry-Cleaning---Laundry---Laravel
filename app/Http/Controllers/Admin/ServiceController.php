<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Section;
use App\Models\Category;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ServiceRequest;
use Str;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servies = Service::select('id','title','price','created_at','updated_at')->get();
        return view('admin.service.index',compact('servies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $sections = Section::all('id','name');
        $categories = Category::all('id','name');
        return view('admin.service.create_edit',compact('sections','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
       
        $msg = '';
        try{
            \DB::beginTransaction();
            $service = new Service;
            
            $service->section_id  = $request->section_id;
            $service->category_id   = $request->category_id ;
            $service->title  = $request->title;
            $service->price  = $request->price;
            $service->description  = $request->description;
           
            $service->save();
            $msg = "Successfully Saved!";    
            \DB::commit();  
             return redirect()->route('admin.service.index')->with(['success'=>true,'message'=>$msg]);  
        }catch(\Exception $e){           
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
            return back()->withInput($request->all())->with(['success'=>false,'message'=>$msg]);
        }
       
       
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        // if(!auth()->user()->can('')){
        //     abort(403);
        // }
        $sections = Section::all('id','name');
        $categories = Category::all('id','name');
        return view('admin.service.create_edit',compact('service','sections','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        // if(!auth()->user()->can('')){
        //     abort(403);
        // }
        
        $msg = [];
        try{
            \DB::beginTransaction();
            
          
            $service->section_id  = $request->section_id;
            $service->category_id   = $request->category_id ;
            $service->title  = $request->title;
            $service->price  = $request->price;
            $service->description  = $request->description;
           
            $service->save();
            $msg = "Successfully Updated";    
            \DB::commit();   
            return redirect()->route('admin.service.index')->with(['success'=>true,'message'=>$msg]); 
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $msg = [];
        try{
            \DB::beginTransaction();
            
            $service->delete();
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
