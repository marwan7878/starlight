<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Info extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'description',
    ];
    protected $dates = ['deleted_at'];
}
