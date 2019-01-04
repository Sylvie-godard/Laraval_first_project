<?php

namespace App\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}