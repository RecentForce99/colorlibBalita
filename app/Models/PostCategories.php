<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    public $timestamps=True;

    protected $fillable=[
        'id',
        'name',
        'code',
        'priority',
        'description',
        'preview_picture',
        'category_id',
        'created_at',
        'updated_at',
    ];
}
