<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WebsitePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('website_parts')->delete();

        $data = [
            ['key' => 'show_bar', 'value' => '1','image'=>''],
            ['key' => 'featured_categories_section', 'value' => '1','image'=>''],
            ['key' => 'trending_product_section', 'value' => '1','image'=>''],
            ['key' => 'banner_section', 'value' => '1','image'=>''],
            ['key' => 'special_offers_section', 'value' => '1','image'=>''],
            ['key' => 'home_product_list_section', 'value' => '1','image'=>''],
            ['key' => 'brands_section', 'value' => '1','image'=>''],
            ['key' => 'blog_section', 'value' => '1','image'=>''],
            ['key' => 'shipping_info_section', 'value' => '1','image'=>''],
            ['key' => 'best_sellers', 'value' => '1','image'=>''],
            ['key' => 'new_arrivals', 'value' => '1','image'=>''],
            ['key' => 'top_rated', 'value' => '1','image'=>''],
        ];

        DB::table('website_parts')->insert($data);
    }
}
