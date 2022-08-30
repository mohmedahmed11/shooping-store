<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductOption extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'product_options';
    protected $fillable = ['id','name','product_id','image'];


    public function productOption()
    {
        $this->hasOne(Product::class, 'product_id' , 'id');
    }

}
