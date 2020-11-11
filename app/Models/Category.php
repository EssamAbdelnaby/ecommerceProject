<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description',  'image'
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value,'-');
    }
    ################### Start Relations ###################################
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function brands(){
        return $this->belongsToMany('APP\Models\Brand','brand_category','category_id','brand_id');
    }

    ################### End Relations ###################################

}
