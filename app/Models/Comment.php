<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Replies;
class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['id','product_id','body'];
    public function product()
    {
       return $this->belongsTo(Product::class, 'product_id' , 'id');
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function replaies()
    {
       return $this->hasMany(Replies::class, 'comment_id' , 'id')->orderBy('created_at');
    }
    // public function comment()
    // {
    //    return $this->hasMany(Comment::class,'id');
    // }

}
