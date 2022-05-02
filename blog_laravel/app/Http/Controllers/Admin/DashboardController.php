<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Image;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        
    } 


    function AdminIndex(){
       return view('admin.dashboard');
         //return redirect(route('admin.dashboard'));
    }
    function profile(){
        $admin=auth::guard('admin')->user();
 return view('admin.profile', compact('admin'));
    } 

    function profileSubmit(Request $request ){
        $request->validate([
         'name'=>'required',
         'email'=>'required|email',
         'image'=>'mimes:jpeg,jpg,png',
        ]);
        $admin=auth::guard('admin')->user();
        $admin->name=$request->name;
        $admin->email=$request->email;
        
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->GetClientOriginalName();
            $image->move(asset('assets/images/'.$name));
            
            $admin->image=$name;
        }
        $admin->update();
        return back()-with('message', 'Data Update Successfully');
    
    }
    function ResetAdmin(){
        return view('admin.reset');
    }
    function ResetPassword(Request $request){
       $request->validate([
           'old_password'=>'required',
           'new_password'=>'required',
           'confirm_password'=>'required',

       ]);
       $admin_password=auth::guard('admin')->user();
       $old_password=$request->old_password;
       if(hash::check($old_password,$admin_password->password)){
          if($request->new_password==$request->confirm_password){
              $admin_password->password=Hash::make($request->new_password);
              $admin_password->update();
              return back()->with('success', 'Update Password Successfully');
          }else{
            return back()->with('message', 'New && Confirm Password Don"t Match');
          }

       }else{
        return back()->with('message', 'Old Pass don"t match');
       }
    }
}
