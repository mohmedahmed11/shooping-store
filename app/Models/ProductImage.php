<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_images';
    protected $fillable = ['id','is_deleted','product_id','image'];



    // relations of products
    public function imageprodut()
    {
        $this->belongsTo('App\Models\Product', 'product_id' , 'id');
    }

    //#####################

    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image) ;
    }







}
