<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title',
        'review',
        'reviewed_user',
        'author',
    ];

    protected $table = 'reviews';

    public function getUser(){
        return $this->belongsTo('\App\Models\User', 'reviewed_user', 'id');
    }

    public function getAuthor(){
        return $this->belongsTo('\App\Models\User', 'author', 'id');
    }
}
