<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{        
    protected $fillable = ['firstname', 'lastname', 'goals', 'height', 'age', 'birthdate', 'weight', 'position', 'teams_id'];

    public function team()
    {
        return $this->belongTo('App\Team\Team');
    }
}
