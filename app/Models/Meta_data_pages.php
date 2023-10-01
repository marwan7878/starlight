<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Meta_data_pages extends Model
{
    use HasFactory;

    protected $fillable = ['title','link','description','title_social','description_social','alt','image','category_id'];

    const IMAGE_PATH = 'meta_data';

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function getImageUrlAttribute()
    {
        if($this->image != "")
        {
            return url('/'.$this->image);
        }
        return "";
    }
}
