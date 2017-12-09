<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    /**
    * Get the videos that belong to this athlete
    */
    public function videos()
    {
        # Athlete has many Videos
        # Define a one-to-many relationship.
        return $this->hasMany('App\Video');
    }

    /**
    * Get the sports that this athlete participates in
    */
    public function sports()
    {
        # Athlete has many Sports
        # Define a many-to-many relationship.
        return $this->belongsToMany('App\Sport')->withTimestamps();
    }
}
