<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class category extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['image'];
    protected $fillable = ['name' , 'image'];
    
    public function getImageUrlAttribute()
    {
        return url('/').'/'.$this->image;
    }
    
}
