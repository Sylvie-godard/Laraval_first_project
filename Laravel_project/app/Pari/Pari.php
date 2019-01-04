<?php

namespace App\Pari;

use Illuminate\Database\Eloquent\Model;

class Pari extends Model
{
    protected $fillable = ['users_id', 'teams_id', 'amount'];

    public function Matches()
    {
        return $this->belongsToMany('App\Match\Match');
    }
}
