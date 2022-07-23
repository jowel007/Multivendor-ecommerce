<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;

use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    //update password
    public function UpdateAdminPassword(){
        //echo "<pre>"; print_r(Auth::guard('admin')->user()); die();
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.setting.update_admin_password')->with(compact('adminDetails'));
    }

    //check admin password

    public function CheckAdminPassword(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    //end check admin password

    public function login(Request $request){
    
    // echo $password = Hash::make('123456'); die;

      if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        $customeMessage = [
            //add custome message here....
            'email.required' => 'Email is Required!',
            'email.email' => 'Valid Email is Required!',
            'password.required' => 'Password is Required!',
        ];

        $this->validate($request,$rules,$customeMessage);

        if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])) {
            return redirect('admin/dashboard');
        }else {
            return redirect()->back()->with('error_message','Invalid Email or Password');
        }

      }
        return view('admin.login');
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
