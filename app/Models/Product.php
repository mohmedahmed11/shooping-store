<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\SimilerProduct;

class Product extends Model
{
   
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id','name','category_id','image','code','quantity','status','price','details'];

    public function scopeSelection($query)
    {
        return $query -> select('id','name','category_id','image','code','quantity','status','price','details');
    }


    // relations of products
    public function category()
    {
        $this->belongsTo('App\Models\Category', 'category_id' , 'id');
    }//end of category

    public function images()
    {
        return $this -> hasMany(ProductImage::class,'product_id','id');
    }

    // public function simlier(){
    //     return $this->hasOne(ProductImage::class,'id', 'similar_product_id');

    // }


    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset('img/'.$this->image) ;
    }
    public function simlier(){
        return $this->hasMany('App\Models\SimilerProduct','product_id','id');
    }


}
