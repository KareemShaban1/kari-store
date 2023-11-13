<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Vendor;
use App\Models\VendorStores;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory(3)->create();
        Brand::factory(20)->create();
        Category::factory(10)->create();
        $this->call(DestinationSeeder::class);
        Store::factory(10)->create();
        $this->call(VendorSeeder::class);
        Vendor::factory(5)->create();
        Product::factory(50)->create();

        VendorStores::factory(5)->create();


        // $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(WebsitePartsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ConfigSettingsSeeder::class);
        \App\Models\User::factory(4)->create();
        $this->call(DeliverySeeder::class);

    }
}