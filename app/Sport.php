<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function videos()
    {
        # Sport has many Videos
        # Define a one-to-many relationship.
        return $this->hasMany('App\Video');
    }

    public function athletes()
    {
        # Sport has many athletes
        # Define a many-to-many relationship.
        return $this->belongsToMany('App\Athlete')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $sports = Sport::orderBy('name')->get();

        $sportsForCheckboxes = [];

        foreach ($sports as $sport) {
            $sportsForCheckboxes[$sport['id']] = $sport->name;
        }
        return $sportsForCheckboxes;
    }
}
