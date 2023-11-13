<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendor = Vendor::create([
        'name'=>'Test Vendor',
        'email'=>'TestVendor@gmail.com',
        'password'=>Hash::make('password'),
        'phone'=>'01212121212',
        'store_id'=>1,
        'active' => 1, 
        ]);
    }
}