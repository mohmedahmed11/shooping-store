<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Like;
use App\Models\SimilerProduct;
use App\Models\ProductOption;
use App\Models\Category;
use App\Models\LatestProducts;
use App\Models\ProductProperty;
use App\Models\Comment;
use App\Models\Replies;

class Product extends Model
{

    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id','name','category_id','image','code','quantity','status','price','details','trademark_id','supplier_id'];

    public function scopeSelection($query)
    {
        return $query -> select('id','name','category_id','image','code','quantity','status','price','details','trademark_id','supplier_id');
    }

    protected $appends = [
        'image_path',
        'rateavg',
'likes',
'dislikes'
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

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }//end of orders

    public function images()
    {
        return $this -> hasMany(ProductImage::class,'product_id','id');
    }
    
    public function simliers(){

        return $this->hasMany(SimilerProduct::class,'product_id','id');
    }

    public function options()
    {
        return $this -> hasMany(ProductOption::class,'product_id','id')->orderBy('id', 'desc');
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

    public function coments()
    {
       return  $this->hasMany(Comment::class, 'product_id' , 'id');
    }

    public function replay()
    {
       return  $this->hasMany(Replies::class, 'product_id' , 'id');
    }

    public function likes()
    {
        return $this -> hasMany(Like::class,'product_id','id');
    }//end of likes

    public function rates()
    {
        return $this -> hasMany(Rate::class,'product_id','id');
    }//end of likes

    public function getRateavgAttribute()
    {
        $rates = Rate::where('product_id', $this->id)->get();
        $total_rate = 0;
        foreach($rates as $rate){
            $total_rate = $total_rate + $rate->rate;
        }
        $count = count($rates);

        return $count > 0 ? $total_rate / $count : 0;
    }
    public function getLikesAttribute()
    {
        return count(Like::where(['product_id' => $this->id, 'status' => 1])->get());
    }
    public function getDislikesAttribute()
    {
        return count(Like::where(['product_id' => $this->id, 'status' => 0])->get());
    }

}
