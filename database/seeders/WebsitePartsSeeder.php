<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['key' => 'left_show_bar', 'value' => '1'],
            ['key' => 'right_show_bar', 'value' => '1'],
            ['key' => 'featured_categories_section', 'value' => '1'],
            ['key' => 'trending_product_section', 'value' => '1'],
            ['key' => 'banner_section', 'value' => '1'],
            ['key' => 'special_offers_section', 'value' => '1'],
            ['key' => 'home_product_list_section', 'value' => '1'],
            ['key' => 'brands_section', 'value' => '1'],
            ['key' => 'blog_section', 'value' => '1'],
            ['key' => 'shipping_info_section', 'value' => '1'],
            ['key' => 'best_sellers', 'value' => '1'],
            ['key' => 'new_arrivals', 'value' => '1'],
            ['key' => 'top_rated', 'value' => '1'],
        ];

        DB::table('website_parts')->insert($data);
    }
}
