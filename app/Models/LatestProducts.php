<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestProducts extends Model
{
    public $timestamps = false;
    protected $table = 'latest_products';
    protected $fillable = ['id','product_id','status'];

    public function lastProduct(){
        return $this -> belongsTo(Product::class,'product_id');
    }
}
