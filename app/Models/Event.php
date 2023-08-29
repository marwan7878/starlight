<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $hidden = ['image'];
    protected $appends = ['image_link'];
    
    protected $fillable = ['title','shortdescription','description','image','alt_text','focus_keyword'
                    ,'social_title','social_link','social_description','social_image','social_alt_text'
                    ,'meta_title','meta_link','meta_description'];
    
    public function getImageLinkAttribute()
    {
        return url('/').'/'.$this->image;
    }
}
