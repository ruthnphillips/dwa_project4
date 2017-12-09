<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
    * Get the videos that belong to this sport
    */
    public function videos()
    {
        # Sport has many Videos
        # Define a one-to-many relationship.
        return $this->hasMany('App\Video');
    }

    /**
    * Get the athletes that belong to this sport
    */
    public function athletes()
    {
        # Sport has many athletes
        # Define a many-to-many relationship.
        return $this->belongsToMany('App\Athlete')->withTimestamps();
    }

    /**
    * Get all the sports to construct the checkboxes or dropdown for a view
    */
    public static function getForView()
    {
        $sports = Sport::orderBy('name')->get();

        $sportsForView = [];

        foreach ($sports as $sport) {
            $sportsForView[$sport['id']] = $sport->name;
        }
        return $sportsForView;
    }
}
