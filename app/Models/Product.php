<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $hidden = ['images'];
    protected $append = ['images_url'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','images','category_id','shortdescription','description','alt_text','focus_keyword'
                ,'social_title','social_link','social_image','social_description','social_alt_text'
                ,'meta_title','meta_link','meta_description'];
    protected $casts = [
        'images' => 'array',
        'alt_text' => 'array'
    ];
  
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function getImageUrlAttribute()
    {
        return url('/').'/'.$this->images;
    }
}
