<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name'=>'kareem shaban',
            'email'=>'kareemshaban120@gmail.com',
            'user_name'=>'kareem_shaban',
            'password'=>Hash::make('password'),
            'phone_number'=>'01090537394',
            'super_admin'=>true
        ]);
    }
}
