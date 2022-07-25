<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetails;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBusinessDetailsRecords = [
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'Jhon Electronic Store','shop_address'=>'p-29MH',
            'shop_city'=>'Mohammadpur','shop_state'=>'Dhaka','shop_country'=>'Bangladesh','shop_pincode'=>'1207',
            'shop_mobile'=>'01875628575','shop_website'=>'www.jhonMart.com','shop_email'=>'jhon@admin.com',
            'address_proof'=>'Passport','address_proof_image'=>'test.jpg','business_licence_number'=>'1847313526',
            'gst_number'=>'123456','pan_number'=>'654321'],
        ];

        VendorsBusinessDetails::insert($vendorBusinessDetailsRecords);
    }
}
