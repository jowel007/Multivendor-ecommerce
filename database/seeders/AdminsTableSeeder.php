<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
          ['id'=>1,'name'=>'Super Admin','type'=>'superadmin','vendor_id'=>0,
          'mobile'=>'01874313526','email'=>'admin@admin.com','password'=>'$2a$12$GwZVPTn5HqaExNQCt9sYWe5yyN8c92gLDiStopuXehL2rRbq5oHpS','image'=>'','status'=>1],
        ];

        Admin::insert($adminRecords);
    }
}
