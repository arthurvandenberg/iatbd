<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'description',
        'available_date',
        'length_of_stay',
        'compensation_amount'
    ];

    protected $table = "pets";

    public function getOwner(){
        return $this->belongsTo("\App\Models\User", "owner_id", "id");
    }
}
