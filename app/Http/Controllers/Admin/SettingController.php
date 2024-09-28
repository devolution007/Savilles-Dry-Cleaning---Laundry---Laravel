<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCatagory;
use App\Models\Setting;
use App\Models\Social;
use App\Models\SubCatagory;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class SettingController extends Controller
{
    //

    public function createMainCatagory()
    {

        return view('admin.setting.create_catagory');
    }

    public function listMainCatagory()
    {

        $categories = MainCatagory::all();
        return view('admin.setting.list_main_catagory', compact('categories'));
    }

    public function storeCatagory(Request $request)
    {

        $msg = '';
        try {
            \DB::beginTransaction();
            $category = new MainCatagory;
            $category->catagory_name = $request->name;
            $category->save();
            $msg = "Successfully Saved!";
            \DB::commit();
            return redirect()->route('admin.setting.list_catagory')->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e);
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with(['success' => false, 'message' => $msg]);
        }
    }

    public function EditCatagory(Request $request, $id)
    {
        $category = MainCatagory::where('id', $id)->first();
        return view('admin.setting.create_catagory', compact('category'));
    }

    public function updateCatagory(Request $request)
    {
        $msg = '';
        try {
            \DB::beginTransaction();
            $category = MainCatagory::where('id', $request->id)->first();
            $category->catagory_name = $request->name;
            $category->save();
            $msg = "Successfully Updated";
            \DB::commit();
            return redirect()->route('admin.setting.list_catagory')->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->with(['success' => false, 'message' => $msg]);
        }
    }

    public function deleteCatagory($id)
    {

        $msg = [];

        try {
            \DB::beginTransaction();
            $category = MainCatagory::where('id', $id)->first();
            $category->delete();
            $msg = ["success" => true, "message" => "Successfully Deleted"];
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = ["success" => false, "message" => "Something went wrong!"];
        }

        return response()->json($msg);
        // return view('admin.setting.create_catagory');
    }

    public function createSubCatagory()
    {

        $categories = MainCatagory::all('id', 'catagory_name');
        return view('admin.setting.create_sub_catagory', compact('categories'));
    }

    public function storeSubCatagory(Request $request)
    {

        $msg = '';
        try {
            \DB::beginTransaction();
            $categories = new SubCatagory;

            $categories->main_cat_id  = $request->category_id;
            $categories->sub_cat_name   = $request->sub_cat_name;
            $categories->url  = $request->url;
            $categories->save();
            $msg = "Successfully Saved!";
            \DB::commit();
            return redirect()->route('admin.setting.list_sub_catagory')->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e);
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->withInput($request->all())->with(['success' => false, 'message' => $msg]);
        }
    }

    public function listSubCatagory(Request $request)
    {
        // $categories = SubCatagory::all();  
        //     $categories = SubCatagory::join('footer_main_catagoris', 'footer_sub_catagoris.main_cat_id', '=', 'footer_main_catagoris.id')
        // ->select('footer_sub_catagoris.*', 'footer_main_catagoris.*')
        // ->get();
        $categories = MainCatagory::join('footer_sub_catagoris', 'footer_main_catagoris.id', '=', 'footer_sub_catagoris.main_cat_id')
            ->select('footer_sub_catagoris.*', 'footer_main_catagoris.catagory_name as main_category_name')
            ->get();



        return view('admin.setting.list_sub_catagory', compact('categories'));
    }
    public function editSubCatagory(Request $request, $id)
    {

        $service = SubCatagory::where('id', $id)->first();
        $categories = MainCatagory::all('id', 'catagory_name');
        return view('admin.setting.create_sub_catagory', compact('categories', 'service'));
        // return view('admin.setting.create_catagory',compact('category'));
    }

    public function updateSubCatagory(Request $request)
    {
        // dd($request->all());
        $msg = '';
        try {
            \DB::beginTransaction();
            
            $categories = SubCatagory::where('id', $request->id)->first();
            $categories->main_cat_id  = $request->category_id;
            $categories->sub_cat_name   = $request->sub_cat_name;
            $categories->url  = $request->url;
            $categories->save();
            $msg = "update Successfully Saved!";
            \DB::commit();
            return redirect()->route('admin.setting.list_sub_catagory')->with(['success' => true, 'message' => $msg]);
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e);
            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = "Something went wrong!";
            return back()->withInput($request->all())->with(['success' => false, 'message' => $msg]);
        }
    }

    public function deleteSubCatagory($id)
    {

        $msg = [];
        try {
            \DB::beginTransaction();
            $category = SubCatagory::where('id', $id)->first();
            $category->delete();
            $msg = ["success" => true, "message" => "Successfully Deleted"];
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();

            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = ["success" => false, "message" => "Something went wrong!"];
        }

        return response()->json($msg);
    }

    public function footer()
    {

        $setting = Setting::first();
        $social = Social::get();
        // dd($setting);
        return view('admin.setting.footer', compact('setting','social'));
    }
    public function footerUpdate(Request $request)
    {


        $msg = '';
        if (isset($request->logo)) {

            $subCatImage = $request->file('logo');
            $subCatImageName = time() . '.' . $subCatImage->getClientOriginalExtension();
            // $subCatImage->storeAs('public/images', $subCatImageName);
            $subCatImage->move(public_path('assets/images/logo'), $subCatImageName);
        } else {
            $subCatImageName = $request->oldLogo;
        }

        $setting = Setting::first();
        if ($setting == null) {
            $setting = new Setting;
        }
        $setting->logo = $subCatImageName;
        $setting->footer_info = $request->discription;
        $setting->mobile_number = $request->mobile_number;
        $setting->save();
        $msg = 'Site setting update successfully';
        return redirect()->route('admin.setting.footer')->with(['success' => true, 'message' => $msg]);
        // return redirect()->back()->with('success',['success'=>true,'message'=>$msg]);
    }

    public function footerCreateSocial(Request $request)
    {
        try{
        $request->validate([
            'logo' => 'required|file|mimes:svg,png,gif|max:2048', // Replace 2048 with the maximum file size in kilobytes
        ]);
        $subCatImage = $request->file('logo');
        $subCatImageName = time() . '.' . $subCatImage->getClientOriginalExtension();
        // $subCatImage->storeAs('public/images', $subCatImageName);
        $subCatImage->move(public_path('assets/images/logo'), $subCatImageName);

        $Social = new Social;
        $Social->logo = $subCatImageName;
        $Social->url = $request->url;

        $Social->save();

        $msg = 'Social Icone add successfully';
        return redirect()->route('admin.setting.footer')->with(['success' => true, 'message' => $msg]);
    } catch (ValidationException $e) {
        // Handle the validation errors manually
        
        return response()->json(['error' => $e->errors()], 422);
    }
    }

    public function social()
    {
        // $setting = Social::first();

        return view('admin.setting.add_social_link');
    }

    public function editSocialIcone(Request $request ,$id){
        $setting = Social::where('id', $id)->first();
        return view('admin.setting.add_social_link', compact('setting'));
        // return view('admin.setting.create_sub_catagory', compact('categories', 'service'));
    }


    public function footerUpdateSocial(Request $request)
    {
        // $request->validate([
        //     'logo' => 'required|file|mimes:svg,png,gif|max:2048', // Replace 2048 with the maximum file size in kilobytes
        // ]);
        if($request->logo){

            $subCatImage = $request->file('logo');
            $subCatImageName = time() . '.' . $subCatImage->getClientOriginalExtension();
            // $subCatImage->storeAs('public/images', $subCatImageName);
            $subCatImage->move(public_path('assets/images/logo'), $subCatImageName);
        }else{
            $subCatImageName = $request->oldLogo;
        }

        $Social = Social::where('id',$request->id)->first();

        $Social->logo = $subCatImageName;
        $Social->url = $request->url;

        $Social->save();

        $msg = 'Social Icone Update successfully';
        return redirect()->route('admin.setting.footer')->with(['success' => true, 'message' => $msg]);
    }

    public function deleteSocialIcone($id){
        $msg = [];
        try {
            \DB::beginTransaction();
            $category = Social::where('id', $id)->first();
            $category->delete();
            $msg = ["success" => true, "message" => "Successfully Deleted"];
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();

            \Log::emergency("File: " . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $msg = ["success" => false, "message" => "Something went wrong!"];
        }

        return response()->json($msg);

    }
}
