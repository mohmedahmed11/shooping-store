<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Banner extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'banners';
    protected $fillable = ['id','is_collection_discount','image','has_product','product_id','status'];

    public function scopeSelection($query)
    {
        return $query -> select('id','is_collection_discount','image','has_product','product_id','status');
    }

    // public function getImageAttribute($val)
    // {
    //     return ($val !== null) ? asset('' . $val) : "";
    // }

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

      public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return $this->image ;
    }










}
