<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'rates';
    protected $fillable = ['id','customer_id','product_id','rate'];

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

