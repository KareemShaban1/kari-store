<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_name','banner_type','active','image','title','sub_title','offer','offer_title','content'
    ];

    public function getImageUrlAttribute(){
        if(!$this->image){
            return 'https://placehold.co/300x300';
        }
        if(Str::startsWith($this->image, ['http://','https://'])){
            return $this->image;
        }
        return asset('storage/banners/'.$this->image);
    } // $banner->image_url

}
