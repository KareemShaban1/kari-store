<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Delivery::create([
            'name' => 'Delivery 1',
            'phone_number' => '01553580925',
            'email' => 'delivery1@app.com',
            'password' => Hash::make('password123'), // Hash the password
            'isOnline' => true,
            'category_id' => 1, // You can set the category and vendor IDs if needed
            'vendor_id' => 1,
        ]);

    }
}