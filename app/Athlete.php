<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    public function videos()
    {
        # Athlete has many Videos
        # Define a one-to-many relationship.
        return $this->hasMany('App\Video');
    }

    public function stats()
    {
        # Athlete has many Stats
        # Define a one-to-many relationship.
        return $this->hasMany('App\Stat');
    }

    public function sports()
    {
        # Athlete has many Sports
        # Define a many-to-many relationship.
        return $this->belongsToMany('App\Sport')->withTimestamps();
    }
}
