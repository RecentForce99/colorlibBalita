<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\ErrorHandler\ErrorRenderer\formatArgs;

class Posts extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'code',
        'priority',
        'description',
        'preview_picture',
        'category_id',
        'date',
        'created_at',
        'updated_at',
    ];


}
