<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'name',
        'kind',
        'image',
        'description',
        'available_date',
        'end_of_stay',
        'compensation_amount'
    ];

    protected $table = 'pets';

    public function getOwner(){
        return $this->belongsTo('\App\Models\User', 'owner_id', 'id');
    }

    public function getRequests(){
        return $this->hasMany('\App\Models\Request', 'pet_id', 'id');
    }

    public function getListings(){
        return $this->hasMany('\App\Models\Listing', 'pet_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($pet) {
            $pet->getRequests()->delete();
            $pet->getListings()->delete();
        });
    }
}
