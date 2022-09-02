<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{

    public function brands(){
        Session::put('page','brands');
        $brands = Brand::get()->toArray();
        // dd($sections);
        return view('admin.brands.brands')->with(compact('brands'));
    }


    //Section status
    public function UpdateBrandStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }

            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }

    //delete
    public function DeleteBrand($id){
        Brand::where('id',$id)->delete();
        $message = "Brand has been deleted Successfully!";
        return redirect()->back()->with('success_message',$message);
    }

    //add edit section
    public function addEditBrand(Request $request,$id=null){
        Session::put('page','brands');
        if ($id=="") {
            $title = "Add Brand";
            $brand = new Brand;
            $message = "Brand Added Successfully !";
        }else {
            $title = "Edit Brand";
            $brand = Brand::find($id);
            $message = "Brand Updated Successfully !";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                
            ];

            $customeMessage = [
                //add custome message here....
                'name.required' => 'Brand Name is Required!',
                'name.regex' => 'Valid Brand Name is Required!',
            ];

            $this->validate($request,$rules,$customeMessage);

            $brand->name = $data['name'];
            $brand->status = 1;
            $brand->save();

            return redirect('admin/brands')->with('success_message',$message);
          
        }
        
        return view('admin.brands.add_edit_brand')->with(compact('title','brand'));

    }

}
