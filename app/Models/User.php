<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'age',
        'email',
        'password',
        'hometown',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public function getPets(){
        return $this->hasMany('\App\Models\Pet', 'owner_id', 'id');
    }

    public function getRequests(){
        return $this->hasMany('\App\Models\Request', 'user_id', 'id');
    }

    public function sitsPets(){
        return $this->belongsToMany('\App\Models\KindOfPet', 'kind', 'sits');
    }
}
