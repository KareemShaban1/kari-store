<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Vendor;
use App\Models\VendorStores;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VendorStoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorStores::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            // Assign a random existing vendor_id and store_id relationship
            'vendor_id' => Vendor::inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
        ];
    }
}
