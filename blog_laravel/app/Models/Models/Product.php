<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','category_id', 'price','stock','status','details','slug','image',
    ];
    
    function home(){
         return $this->belongsTo('App\Models\Models\Category');
    }
}
