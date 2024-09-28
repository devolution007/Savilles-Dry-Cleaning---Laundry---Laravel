<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Service;
use App\Models\Section;
use App\Models\Category;
class ServiceController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.services', [
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.form.editService', [
            'path' => route('services.store')
        ]);
    }

    public function page()
    {
        $sections = Section::has('services')->with('icon','tags')->get();
        return view('services', ['sections' => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $values = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'string|required|max:255',
            'slug' => 'string|required|max:255',
            'content' => 'string|required',
            'details' => 'string|required',
            'status' => 'integer',
        ]);

        $image = '';
        if ($request->file('image')) {
            $image = $this->file($request->file('image'), 'products', true, 172, 172);
        }

        $service = Service::create($values);
        $service->image = $image;
        $service->save();
        return redirect()->route('services.index')->with('success', 'Service Published Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {       
        $section = Section::where('slug',$slug)->with('icon','tags')->firstOrFail();
        $categoriesId = Service::where('section_id',$section->id)->get()->pluck('category_id')->toArray();      
        $categories = Category::whereIn('id',$categoriesId)->get(); 
        $selectedCategory =  $categories->first();
        $services = [];
        if(!empty($selectedCategory)){
            $services = Service::where(['section_id'=>$section->id,'category_id'=>$selectedCategory->id])->get();
        }
       
        $sections = Section::with('icon')->get();
     
        return view('single', [
            'sections' => $sections,
            'services' => $services,
            'categories' => $categories,
            'section' => $section,
            'selectedCategory'=>$selectedCategory
        ]);
    }

    public function categoryServices(Request $request)
    {       
        // dd($request->all());
        $section = Section::findOrFail($request->section_id);
        $category = Category::findOrFail($request->category_id);
        $services = Service::where(['section_id'=>$section->id,'category_id'=>$category->id])->get();   
        return view('category_services', [
            'services' => $services,          
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.form.editService', [
            'path' => route('services.update', $service->id),
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $values = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'string|required|max:255',
            'slug' => 'string|required|max:255',
            'details' => 'string|required',
            'content' => 'string|required',
            'status' => 'integer',
        ]);

        if ($request->file('image')) {
            $image = $this->file($request->file('image'), 'products', true, 172, 172);
            if ($image) {
                $imagePath = public_path('images/products/' . $service->image);
                File::delete($imagePath);
            }
            $service->image = $image;
        }

        $service->title = $values['title'];
        $service->slug = $values['slug'];
        $service->details = $values['details'];
        $service->content = $values['content'];
        $service->status = $values['status'];
        $service->save();
        return redirect()->route('services.index')->with('success', 'Service Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // service price
        ServicePrices::where('service_id', $service->id)->delete();
        // service details
        ServiceDetails::where('service_id', $service->id)->delete();

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service Deleted Successfully!');
    }
}
