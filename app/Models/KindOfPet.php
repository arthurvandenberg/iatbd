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

    public static function boot() {
        parent::boot();

        static::deleting(function($kindofpet) {
            $kindofpet->allPets()->delete();
        });
    }
}
