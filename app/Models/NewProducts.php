<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProducts extends Model
{
    public $timestamps = false;
    protected $table = 'new_products';
    protected $fillable = ['id','product_id','status','category_id'];

    public function newProducts(){

        return $this -> belongsTo(Product::class,'product_id');

    }
}
