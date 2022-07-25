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
          ['id'=>2,'name'=>'Jhon','type'=>'vendor','vendor_id'=>1,
          'mobile'=>'01875628575','email'=>'jhon@admin.com','password'=>'$2a$12$GwZVPTn5HqaExNQCt9sYWe5yyN8c92gLDiStopuXehL2rRbq5oHpS','image'=>'','status'=>0],
        ];

        Admin::insert($adminRecords);
    }
}
