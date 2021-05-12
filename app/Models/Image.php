<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'image640',
        'image1280',
        'image1920',
    ];

    protected $table = 'images';

    public function getUser(){
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }
}
