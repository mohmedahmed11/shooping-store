<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'order_items';
    public $fillable = ['id','order_id','product_id','count'];




    public function product()
    {
       return $this->belongsTo(Product::class, 'product_id' , 'id');
    }

    // public function products(){
    //     return $this->belongsTo(Product::class,Order::class,'id','id','id','id');
    // }

}



