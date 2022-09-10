<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class BestSellerProducts extends Model
{
    public $timestamps = false;
    protected $table = 'best_seller_products';
    protected $fillable = ['id','product_id','status'];

    public function bestProduct(){
        return $this -> belongsTo(Product::class,'product_id');
    }
}
