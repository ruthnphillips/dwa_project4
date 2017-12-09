<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
    * Get the athlete that owns this video
    */
    public function athlete()
    {
        # Video belongs to Athlete
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Athlete');
    }

    /**
    * Get the sport that this video is a part of.
    * This video belongs to this sport
    */
    public function sport()
    {
        # Video belongs to Sport
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Sport');
    }

    /**
    * Rank the video based on votes categorized by the type of sport and position
    */
    public static function rankVideo()
    {
        $temptable = \DB::update('UPDATE videos dest, (SELECT a.video_link,
                      a.votes,
                      a.sport_id,
                      a.position,
                      a.id,
                        count(b.votes)+1 as ranktemp
                FROM  videos a left join videos b on a.sport_id=b.sport_id and a.votes<b.votes
                group by a.video_link,
                      a.votes,
                      a.sport_id,
                      a.position,
                      a.id) src
                SET dest.rank = src.ranktemp
                WHERE dest.id = src.id
                ');
    }
}
