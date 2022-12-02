<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'expenses';
    protected $fillable = ['id','data','price','type','date'];

    public function scopeSelection($query)
    {
        return $query -> select('id','data','price','type','date');
    }



// relations of categories
    // public function product()
    // {
    //     return $this -> hasMany('App\Models\Product','category_id','id');
    // }














}

