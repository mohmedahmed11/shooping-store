<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['id','user_id','regon_id','address','total','delivery_cost','delivery_period',
    'items_count','note','status','order_from','created_at','updated_at'];

    public function scopeSelection($query)
    {
        return $query -> select('id','user_id','regon_id','address','total','delivery_cost','delivery_period',
        'items_count','note','status','order_from','created_at','updated_at');
    }

// relations of orders
    public function user()
    {
        return $this ->belongsTo(User::class,'user_id','id');
    }//end of user
    public function regon()
    {
        return $this ->belongsTo(Regon::class,'regon_id','id');
    }//end of regon
    public function items()
    {
        return $this ->hasMany(OrderItem::class,'order_id','id')->with('product','product.images','product.simliers','product.options','product.category');
    }

    // 	 Descending 1	count
    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return $this->image ;
    }

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];
    // public functionget getCreatedAtAttribute($value)
    // {
    //     // return ucfirst($value);
    //     return $value->format('Y-m-d');
    // }
    // protected function getCreatedAtAttribute(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d');
    // }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];


}
