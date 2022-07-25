<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Image;

use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    //update admin password
    public function UpdateAdminPassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            //check if current password entered by admin is correct
            if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                // check if new password is match with confirm password
                if ($data['confirm_password']==$data['new_password']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Your Password Updated Successfully!');
                }else {
                    return redirect()->back()->with('error_message','New Password And Confirm Password does not Match!');
                }
            }else{
                return redirect()->back()->with('error_message','Your Current Password is Incorrect!');
            }
        }
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

    //Update admin details
    public function UpdateAdminDetails(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];

            $customeMessage = [
                //add custome message here....
                'admin_name.required' => 'Name is Required!',
                'admin_name.regex' => 'Valid Name is Required!',
                'admin_mobile.required' => 'Mobile is Required!',
                'admin_mobile.numeric' => 'Valid Mobile is Required!',
            ];

            $this->validate($request,$rules,$customeMessage);

            //upload admin image
            if ($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    // get image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            }else if (!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            }else{
                $imageName = "";
            }


            // update admin details
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);

            return redirect()->back()->with('success_message','Admin Details Updated Successfully!');
        }
        return view('admin.setting.update_admin_details');
    }

    //end Update admin details



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
