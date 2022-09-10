<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductsController extends Controller
{
    public function products(){
        $products = Product::with(['section'=>function($query){$query->select('id','name');},'category'=>function($query){$query->select('id','category_name');}])->get()->toArray();
        // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }

    //Product status
    public function UpdateProductStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }

            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }


    
    //delte Product

    public function DeleteProduct($id){
        Product::where('id',$id)->delete();
        $message = "Product has been deleted successfully";
        return redirect()->back()->with('success_message',$message);
    }
}
