<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'user_id',
        'image',
    ];

    protected $table = 'images';

    public function getUser(){
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }
}
