<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Image;

use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use App\Models\VendorsBankDetails;

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

    //Update vendor details
    public function UpdateVendorDetails($slug, Request $request){
        if ($slug=="personal") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;

                $rules = [
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile' => 'required|numeric',
                ];
    
                $customeMessage = [
                    //add custome message here....
                    'vendor_name.required' => 'Name is Required!',
                    'vendor_city.required' => 'City is Required!',
                    'vendor_name.regex' => 'Valid Name is Required!',
                    'vendor_city.regex' => 'Valid City is Required!',

                    'vendor_mobile.required' => 'Mobile is Required!',
                    'vendor_mobile.numeric' => 'Valid Mobile is Required!',
                ];
    
                $this->validate($request,$rules,$customeMessage);
    
                //upload admin image
                if ($request->hasFile('vendor_image')) {
                    $image_tmp = $request->file('vendor_image');
                    if ($image_tmp->isValid()) {
                        // get image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //generate new image
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/photos/'.$imageName;
                        //upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                }else if (!empty($data['current_vendor_image'])) {
                    $imageName = $data['current_vendor_image'];
                }else{
                    $imageName = "";
                }
    
    
                // update in admin details
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
                // update in vendors details
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'address'=>$data['vendor_address'],
                'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);

                return redirect()->back()->with('success_message','Vendor Details Updated Successfully!');

            }

        $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }elseif ($slug=="business") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;

                $rules = [
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                    'address_proof' => 'required',
                ];
    
                $customeMessage = [
                    //add custome message here....
                    'shop_name.required' => 'Name is Required!',
                    'shop_city.required' => 'City is Required!',
                    'shop_name.regex' => 'Valid Name is Required!',
                    'shop_city.regex' => 'Valid City is Required!',

                    'shop_mobile.required' => 'Mobile is Required!',
                    'shop_mobile.numeric' => 'Valid Mobile is Required!',
                ];
    
                $this->validate($request,$rules,$customeMessage);
    
                //upload admin image
                if ($request->hasFile('address_proof_image')) {
                    $image_tmp = $request->file('address_proof_image');
                    if ($image_tmp->isValid()) {
                        // get image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //generate new image
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/proofs/'.$imageName;
                        //upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                }else if (!empty($data['current_address_proof'])) {
                    $imageName = $data['current_address_proof'];
                }else{
                    $imageName = "";
                }
    
   
    
                // update in vendors business details
            VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_mobile'=>$data['shop_mobile'],'shop_address'=>$data['shop_address'],
                'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],
                'business_licence_number'=>$data['business_licence_number'],'pan_number'=>$data['pan_number'],'gst_number'=>$data['gst_number'],
                'address_proof'=>$data['address_proof'],'address_proof_image'=>$imageName]);

                return redirect()->back()->with('success_message','Vendor Business Details Updated Successfully!');

            }

            $vendorDetails = VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }elseif ($slug=="bank") {

            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;

                $rules = [
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name' => 'required',
                    'account_number' => 'required|numeric',
                    'bank_ifsc_code' => 'required',
                ];
    
                $customeMessage = [
                    //add custome message here....
                    'account_holder_name.required' => 'Account Holder Name is Required!',
                    'account_holder_name.regex' => 'Valid Account Holder Name is Required!',
                    'bank_name.required' => 'Bank Name is Required!',
                    'account_number.required' => 'Account Number is Required!',
                    'account_number.numeric' => 'Valid Account Number is Required!',
                    'bank_ifsc_code.required' => 'Bank IFSC Code is Required!',
                ];
    
                $this->validate($request,$rules,$customeMessage);
    
               
            // update in vendors Bank details
            VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],
                    'account_number'=>$data['account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);

                return redirect()->back()->with('success_message','Vendor Bank Details Updated Successfully!');

            }

            $vendorDetails = VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }

        return view('admin.setting.update_vendor_details')->with(compact('slug','vendorDetails'));
    }
    //end Update vendor details

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

    //// admins / subadmins /vendors

    public function admins($type=null){
        $admins = Admin::query();
        if (!empty($type)) {
            $admins = $admins->where('type',$type);
            $title = ucfirst($type)."s";
        }else {
            $title = "All Admins/SubAdmins/Vendors";
        }
        $admins = $admins->get()->toArray();
        // dd($admins);
        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    // view vendor details

    public function ViewVendorDetails($id){
        $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        //dd($vendorDetails);

        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

    //admin update status
    public function UpdateAdminStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }

            Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
