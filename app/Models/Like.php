<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'product_likes';
    protected $fillable = ['id','customer_id','product_id','status'];

// relations of like
    public function customer()
    {
        return $this -> belongsTo('App\Models\Customer','customer_id','id');
    }//end of customer

    public function product()
    {
        return $this -> belongsTo('App\Models\Product','customer_id','id');
    }//end of product















}

