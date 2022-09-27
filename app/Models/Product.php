<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Banner;
use App\Models\SimilerProduct;
use App\Models\ProductOption;
use App\Models\Category;
use App\Models\LatestProducts;
use App\Models\ProductProperty;

class Product extends Model
{

    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id','name','category_id','image','code','quantity','status','price','details'];

    public function scopeSelection($query)
    {
        return $query -> select('id','name','category_id','image','code','quantity','status','price','details');
    }

    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset(''.$this->image) ;
    }

    // relations of products
    public function category()
    {
        return $this->belongsTo(Category::Class, 'category_id' , 'id');
    }//end of category

    public function images()
    {
        return $this -> hasMany(ProductImage::class,'product_id','id');
    }
    public function simliers(){
        return $this->hasMany(SimilerProduct::class,'product_id','id');
    }

    public function options()
    {
        return $this -> hasMany(ProductOption::class,'product_id','id');
    }

    public function properties(){
        return $this -> hasMany(ProductProperty::class,'product_id','id');
    }


    // public function last(){
    //     return $this -> hasMany(LatestProducts::class,'product_id','id');
    // }
    // public function items()
    // {
    //     return  $this->hasMany(OrderItem::class, 'product_id' , 'id');
    // }


    public function productitem()
    {
       return  $this->belongsTo(Product::class, 'product_id' , 'id');
    }



}
