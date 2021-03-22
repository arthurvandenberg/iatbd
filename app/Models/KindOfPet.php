<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOfPet extends Model
{
    protected $table = 'kind_of_pet';

    public function allPets(){
        return $this->hasMany('\App\Models\Pet', 'kind', 'kind');
    }

    public function whoSits(){
        return $this->belongsToMany('\App\Models\User', 'sits', 'kind');
    }
}
