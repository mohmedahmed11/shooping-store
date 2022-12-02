<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilerProduct extends Model
{
    use HasFactory;
    protected $table="similar_products";
    protected $fillable=['product_id','similar_product_id','status'];
    public $timestamps=false;

    public function product()
    {
        return $this -> belongsTo('App\Models\Product','similar_product_id','id');
    }

}
