<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'regons';
    protected $fillable = ['id','name','delivery_cost','status'];

    public function scopeSelection($query)
    {
        return $query -> select( 'id','name','delivery_cost','status');
    }

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

      public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }


}
