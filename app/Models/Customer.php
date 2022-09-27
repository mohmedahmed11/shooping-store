<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    // public $timestamps = false;

    protected $table = 'customers';
    protected $fillable = ['id','name','phone'];

    public function scopeSelection($query)
    {
        return $query -> select( 'id','name','phone');
    }

    // relations of categories
    public function orders()
    {
        return $this -> hasMany(Order::class,'user_id','id');
    }

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

