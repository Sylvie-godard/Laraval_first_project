<?php

namespace App\Match;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['scoreBoard', 'winner_id', 'teams1_id', 'teams2_id', 'placement', 'temperature', 'nb_faults'];

    public function Paris()
    {
        return $this->belongsToMany('App\Pari\Pari');
    }
}
