<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','image','info'
    ];

    public function products()
    {
        $this->hasMany(Product::class);
    }


    public function getImageUrlAttribute()
    {
        if(!$this->image) {
            return 'https://placehold.co/300x300';
        }
        if(Str::startsWith($this->image, ['http://','https://'])) {
            return $this->image;
        }
        return asset('storage/brands/'.$this->image);
    } // $brand->image_url


}
