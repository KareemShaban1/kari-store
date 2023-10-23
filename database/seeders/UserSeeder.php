<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name' => 'kareem',
            'last_name' => 'shaban',
            'email_address' => 'test@gmail.com',
            'password' => Hash::make('password'), // password
            'phone_number'=>'01222222222',
            'gender' => 'male',
            'governorate_id'=>2,
            'city_id'=>3,
            'neighborhood_id'=>4,
            'postal_code'=>'',
            'street_address'=>'بنها , أتريب',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // // timestamp inserted with null
        // DB::table('users')->insert([
        //     'name'=>'Admin ',
        //     'email'=>'Admin120@gmail.com',
        //     'password'=>Hash::make('password'),
        // ]);
    }
}