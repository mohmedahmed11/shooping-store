<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'categories';
    protected $fillable = ['id','name','image'];

    public function scopeSelection($query)
    {
        return $query -> select( 'id','name','image');
    }


// relations of categories
    public function products()
    {
        return $this -> hasMany('App\Models\Product','category_id','id');
    }


    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return $this->image ;
    }














}

