<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
class CategoryController extends Controller
{
    public function index()
    {       
       
        $categories = Category::all();  
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        
        // if(!auth()->user()->can('post_code.create')){
        //     abort(403);
        // }
        return view('admin.category.create_edit');
    }

    public function store(CategoryRequest $request)
    {
        // if(!auth()->user()->can('post_code.create')){
        //     abort(403);
        // }
        $msg = '';
        try{
            \DB::beginTransaction();
            $category = new Category;
            $category->name = $request->name;
            $category->save();
            $msg = "Successfully Saved!";    
            \DB::commit();    
            return redirect()->route('admin.category.index')->with(['success'=>true,'message'=>$msg]);
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
     * @param  \App\Models\PostCode  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCode  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('admin.category.create_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCode  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        // if(!auth()->user()->can('post_code.edit')){
        //     abort(403);
        // }
        $msg = '';
        try{
            \DB::beginTransaction();            
            $category->name = $request->name;
            $category->save();
            $msg = "Successfully Updated";    
            \DB::commit();    
            return redirect()->route('admin.category.index')->with(['success'=>true,'message'=>$msg]);
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
     * @param  \App\Models\PostCode  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //  if(!auth()->user()->can('post_code.delete')){
        //     abort(403);
        // }
        $msg = [];
      
        try{
            \DB::beginTransaction();            
            $category->delete();
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
