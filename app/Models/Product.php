<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{

    use HasSlug;

    protected $fillable = [
        'name', 'slug', 'details', 'price' , 'description' , 'audio' , 'file', 'size' , 'featured' ,'image' , 'images'
    ];



    public function presentPrice()
    {
        return money_format($this->price , '€%i' );
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function downloaded(){

        $user_download = UserDownload::where('user_id' , auth()->user()->id)->where('product_id' , $this->id)->exists();

        if($user_download){
            return true;
        }else{
            return false;
        }

    }


    public function freeDownload(){

        if($this->price == 0.00){
            return true;
        }else{
            return false;
        }
    }

    public function file(){
        return $this->belongsTo(FileProduct::class);
    }

    public function getProductDescription()
    {
        return new HtmlString($this->description);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
