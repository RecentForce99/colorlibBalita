<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    public $timestamps = True;

    protected $fillable = [
        'id',
        'name',
        'code',
        'priority',
        'created_at',
        'updated_at',
    ];
}
