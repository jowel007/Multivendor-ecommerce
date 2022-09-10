<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsRecords = [
            ['id'=>1,'section_id'=>8,'category_id'=>4,'brand_id'=>7,'vendor_id'=>1,'admin_id'=>0,'admin_type'=>'vendor',
            'product_name'=>'Redmi Note 11','product_code'=>'RN11','product_color'=>'Gradient',
            'product_price'=>20500,'product_discount'=>10,'product_weight'=>181,
            'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'',
            'meta_keywords'=>'','is_featured'=>'Yes','status'=>1],

            ['id'=>2,'section_id'=>1,'category_id'=>5,'brand_id'=>8,'vendor_id'=>0,'admin_id'=>1,'admin_type'=>'superadmin',
            'product_name'=>'Red casul T-shirt','product_code'=>'RTS11','product_color'=>'Red',
            'product_price'=>1200,'product_discount'=>20,'product_weight'=>120,
            'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'',
            'meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
        ];

        Product::insert($productsRecords);
    }
}
