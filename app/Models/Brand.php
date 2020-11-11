<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'name', 'slug', 'description',  'image'
    ];


    ################### Start Relations #################################
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categories(){
        return $this->belongsToMany('APP\Models\Category','brand_category','brand_id','category_id');
    }


    ################### End Relations ###################################

}
