<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'name'=>$name,
            // 'slug'=>Str::slug($name),
            // 'governorate_id'=>Destination::where('rank','1')->inRandomOrder()->first()->id,
            // 'city_id'=>Destination::where('rank','1')->inRandomOrder()->first()->id,
            // 'governorate_id'=>Destination::where('rank','1')->inRandomOrder()->first()->id,
            // 'description'=>$this->faker->sentence(15),
            // 'logo_image'=>$this->faker->imageUrl,
            // 'cover_image'=>$this->faker->imageUrl,
            // 'featured'=>true
            'name' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text,
            'logo_image'=>$this->faker->imageUrl,
            'cover_image'=>$this->faker->imageUrl,
            'active' => 1,
            'percent' => $this->faker->numberBetween(0, 100),
            'phone_number' => $this->faker->phoneNumber,
            'governorate_id' => Destination::where('rank','1')->inRandomOrder()->first()->id, // Replace with actual IDs
            'city_id' => Destination::where('rank','2')->inRandomOrder()->first()->id, // Replace with actual IDs
            'neighborhood_id' => Destination::where('rank','3')->inRandomOrder()->first()->id, // Replace with actual IDs
            'street_address' => $this->faker->streetAddress,
            'featured' => 1,
        ];
    }
}