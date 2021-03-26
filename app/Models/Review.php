<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewed_user',
        'review_by',
        'review',
    ];

    protected $table = 'reviews';
}
