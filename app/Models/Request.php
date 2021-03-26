<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'pet_id',
        'confirmed',
        'finished',
        'reviewed'
    ];

    protected $table = 'requests';

    public function getUser(){
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }

    public function getPet(){
        return $this->belongsTo('\App\Models\Pet', 'pet_id', 'id');
    }
}
