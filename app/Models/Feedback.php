<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'message',
        'status',
        'created_at',
        'updated_at',
    ];
}
