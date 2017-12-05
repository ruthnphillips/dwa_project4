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
}
