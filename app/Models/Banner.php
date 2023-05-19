<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_name','image'
    ];

    public function getImageUrlAttribute(){
        if(!$this->image){
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if(Str::startsWith($this->image, ['http://','https://'])){
            return $this->image;
        }
        return asset('storage/'.$this->image);
    } // $banner->image_url

}
