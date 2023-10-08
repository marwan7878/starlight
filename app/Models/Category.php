<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['image'];
    protected $fillable = ['name' , 'image'];
    
    public function getImageUrlAttribute()
    {
        return url('/').'/'.$this->image;
    }
    
    public function products(){
        return $this->hasMany('App\Models\Product');

    }
}
