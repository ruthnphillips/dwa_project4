<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public function athlete()
    {
        # Stat belongs to Athlete
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Athlete');
    }

    public function video()
    {
        # Stat belongs to Video
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Video');
    }
}
