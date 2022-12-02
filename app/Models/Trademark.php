<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Like;

class Trademark extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'trademarks';
    protected $fillable = ['id','name','image'];

    public function scopeSelection($query)
    {
        return $query -> select( 'id','name','phone');
    }

    // relations of categories
    public function orders()
    {
        return $this -> hasMany(Order::class,'user_id','id');
    }//end of orders

    public function likes()
    {
        return $this -> hasMany(Like::class,'customer_id','id');
    }//end of likes

    // public function getImageAttribute($val)
    // {
    //     return ($val !== null) ? asset('storage/' . $val) : "";
    // }

    // protected $appends = [
    //     'image_path',
    // ];

    // public function getImagePathAttribute()
    // {
    //     return $this->image ;
    // }














}

