<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','image','category_id','description','alt_text','focus_keyword'
                            ,'social_title','social_link','social_image','social_description','social_alt_text'
                            ,'meta_title','meta_link','meta_description'];
  
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
