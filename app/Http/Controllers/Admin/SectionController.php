<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SectionIcon;
use App\Models\Tag;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SectionRequest;
use Str;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sections = Section::join('section_icons as si','si.id','=','sections.section_icon_id')->select(
            'sections.id',
            'sections.name',
            'sections.description', 
            'sections.section_icon_id',        
            'sections.created_at',        
            'sections.updated_at',        
            'si.icon')->get();
        return view('admin.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = SectionIcon::all('id','icon');
        $tags = Tag::all('id','name');
        return view('admin.section.create_edit',compact('icons','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $title = Str::slug($request->name);
        
        $slug = Section::where('slug',$title)->first();
        if(!empty($slug)){
            return back()->withInput($request->all())->with(['success'=>false,'message'=>"Title Already Exists"]);
        }
        $msg = '';
        try{
            
            \DB::beginTransaction();
            $section = new Section;
            $section->slug = $title;
            $section->name = $request->name;
            $section->keywords = $request->keywords;
            $section->section_icon_id = $request->section_icon_id;
            $section->description = $request->description;
            $section->save();
       
            $section->tags()->sync($request->tag_id);
            $msg = "Successfully Saved!";    
            \DB::commit();    
            return redirect()->route('admin.section.index')->with(['success'=>true,'message'=>$msg]);
        }catch(\Exception $e){
            dd($e->getMessage());
             \DB::rollback();
                \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
                $msg = "Something went wrong!";
            return back()->with(['success'=>false,'message'=>$msg]);
        }
       
        return redirect()->route('admin.section.index')->with('message',$msg);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        // if(!auth()->user()->can('')){
        //     abort(403);
        // }
        $icons = SectionIcon::all('id','icon');
        $tags = Tag::all('id','name');
        return view('admin.section.create_edit',compact('icons','section','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        // if(!auth()->user()->can('')){
        //     abort(403);
        // }
        $title = Str::slug($request->name);
        $slug = Section::where('slug',$title)->where('id','!=',$section->id)->first();
        if(!empty($slug)){
            return back()->withInput($request->all())->with(['success'=>false,'message'=>"Title Already Exists"]);
        }
        $msg = '';
        try{
            \DB::beginTransaction();
       
       
            $section->slug = $title;
            $section->name = $request->name;
            $section->section_icon_id = $request->section_icon_id;
            $section->keywords = $request->keywords;
            $section->description = $request->description;   
            // $section->service_overview  = $request->service_overview;
            // $section->suitable_for  = $request->suitable_for;
            // $section->not_include  = $request->not_include;
            // $section->prepare_collection  = $request->prepare_collection;
            // $section->items_back  = $request->items_back;
            $section->save();
            $section->tags()->sync($request->tag_id);
            $msg = "Successfully Updated";    
            \DB::commit();    
            return redirect()->route('admin.section.index')->with(['success'=>true,'message'=>$msg]);
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $msg = '';
        try{
            \DB::beginTransaction();
            
            $section->delete();
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
