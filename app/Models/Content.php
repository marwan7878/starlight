<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $hidden = ['image'];
    protected $appends = ['image_link'];
    protected $fillable = [
        'page_name',
        'type',
        'description',
        'image'
    ];

    public function getImageLinkAttribute()
    {
        return url('/').'/'.$this->image;
    }


}
