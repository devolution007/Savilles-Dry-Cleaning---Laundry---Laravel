<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('area')->get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required|string|max:255|unique:areas',
            'slug' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'main_text_body' => 'required|string',
            'questions.*' => 'nullable|string|max:255',
            'answers.*' => 'nullable|string',
            'answers' => 'required_with:questions|array|size:' . count($request->questions),
            'answers.*' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $area = new Area();
        $area->area = $request->area;
        $area->slug = $request->slug;
        $area->excerpt = $request->excerpt;
        $area->main_text_body = $request->main_text_body;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('thumbnails'), $imageName);
            $area->thumbnail = $imageName;
        }
        $area->save();
        
         // Handle FAQ
        if ($request->has('questions')) {
            foreach ($request->questions as $key => $question) {
                if (!empty($question) && !empty($request->answers[$key])) {
                    $area->faqs()->create([
                        'question' => $question,
                        'answer' => $request->answers[$key],
                    ]);
                }
            }
        }

        return redirect()->route('admin.areas.index')->with('success', 'Area created successfully');
    }
    public function uploadImage(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('upload');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('areas'), $imageName);
        $imageUrl = asset('public/areas/'.$imageName);
        return response()->json(['uploaded' => true, 'url' => $imageUrl]);
    }

    public function uploadCKImage(Request $request) {
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = time().'.'.$extension;
    
            $request->file('upload')->move(public_path('assets/ckeditor_full/uploads'), $filenametostore);
    
            $url = asset('public/assets/ckeditor_full/uploads/'.$filenametostore);
            $message = 'Image successfully uploaded';
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
    
            // Set proper headers for CKEditor to understand the response
            return response($response)->header('Content-Type', 'text/html');
        }
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.areas.edit', compact('area'));
    }

    public function destroy($id)
    {
        $msg = '';
        try{
            \DB::beginTransaction();

            $area = Area::findOrFail($id);
            $area->delete();

            $msg = ["success"=>true,"message"=>"Successfully Deleted"];
            \DB::commit();
        }catch(\Exception $e){
           \DB::rollback();
           \Log::emergency("File: ".$e->getFile().'Line: '.$e->getLine().'Message: '.$e->getMessage());
           $msg = ["success"=>false,"message"=>"Something went wrong!"];
       }
       return response()->json($msg);
   }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required|string|max:255|unique:areas,area,'.$id,
            'slug' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'main_text_body' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $area = Area::findOrFail($id);
        $area->area = $request->area;
        $area->slug = $request->slug;
        $area->excerpt = $request->excerpt;
        $area->main_text_body = $request->main_text_body;
    
            // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('thumbnails'), $imageName);
            $area->thumbnail = $imageName;
        } elseif (isset($request->removebanner)) {
            $area->thumbnail = NULL;
        }
        $area->save();
        
        $area->faqs()->delete();

        if ($request->has('questions')) {
            foreach ($request->questions as $key => $question) {
                if (!empty($question) && !empty($request->answers[$key])) {
                    $area->faqs()->create([
                        'question' => $question,
                        'answer' => $request->answers[$key],
                    ]);
                }
            }
        }

        return redirect()->route('admin.areas.index')->with('success', 'Area updated successfully');
    }

}