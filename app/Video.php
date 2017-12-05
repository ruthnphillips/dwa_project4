<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function athlete()
    {
        # Video belongs to Athlete
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Athlete');
    }

    public function sport()
    {
        # Video belongs to Sport
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Sport');
    }

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
