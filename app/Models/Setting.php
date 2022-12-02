<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'settings';
    protected $fillable = ['id','about','has_banners','delivery_cost','whatsapp','facebook','instagram','twitter'];

    public function scopeSelection($query)
    {
        return $query -> select('id','about','has_banners','delivery_cost','whatsapp','facebook','instagram','twitter');
    }




}
