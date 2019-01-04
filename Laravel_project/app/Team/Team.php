<?php

namespace App\Team;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'country', 'flag','numberPlayers','numberMatchesWon','numberGoals','ranking','created_t', 'updated_at'];

    public function player()
    {
        return $this->hasMany('App\Player');
    }

    public function images()
    {
        return $this->hasMany (Image::class);
    }
}