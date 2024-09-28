<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostCode;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCodeRequest;
class PostCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
       $postalCode = PostCode::all();
        return view('admin.post_code.index',compact('postalCode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.post_code.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCodeRequest $request)
    {
      
        $msg = '';
        try{
            \DB::beginTransaction();
            $postCode = new PostCode;
            $postCode->code = $request->code;
            $postCode->save();
            $msg = "Successfully Saved!";    
            \DB::commit();    
            return redirect()->route('admin.post_code.index')->with(['success'=>true,'message'=>$msg]);
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
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function show(PostCode $postCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCode $postCode)
    {
        return view('admin.post_code.create_edit',compact('postCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function update(PostCodeRequest $request, PostCode $postCode)
    {
      
        $msg = '';
        try{
            \DB::beginTransaction();            
            $postCode->code = $request->code;
            $postCode->save();
            $msg = "Successfully Updated";    
            \DB::commit();    
            return redirect()->route('admin.post_code.index')->with(['success'=>true,'message'=>$msg]);
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
     * @param  \App\Models\PostCode  $postCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCode $postCode)
    {
        
        $msg = [];
      
        try{
            \DB::beginTransaction();            
            $postCode->delete();
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
