<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "password" => "nullable|min:6|max:255"
        ]);
        // if(!auth()->user()->can('post_code.edit')){
        //     abort(403);
        // }
        $msg = '';
        try{
            \DB::beginTransaction(); 
            $user = User::find(auth()->id());           
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->has('password')){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $msg = "Successfully Updated";    
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
