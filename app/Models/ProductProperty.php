<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties;

class ProductProperty extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function property()
    {
       return $this->belongsTo(Properties::class, 'property_id' , 'id');
    }
}
