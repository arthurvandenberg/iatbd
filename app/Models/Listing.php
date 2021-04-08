<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'pet_id',
        'available',
        'available_date',
        'end_of_stay',
        'compensation_amount'
    ];

    public function getPet(){
        return $this->belongsTo('\App\Models\Pet', 'pet_id', 'id');
    }

    public function getRequests(){
        return $this->hasMany('\App\Models\Request', 'listing_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($listing) {
            $listing->getRequests()->delete();
        });
    }
}
