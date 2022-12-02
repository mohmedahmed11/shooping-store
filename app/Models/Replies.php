<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $table = 'replyes';
    protected $fillable = ['id','comment_id','body','user_id'];



    public function user()
    {
       return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function comment()
    {
       return $this->belongsTo(Comment::class, 'product_id' , 'id');
    }


}
