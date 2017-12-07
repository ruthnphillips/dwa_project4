<?php

use Illuminate\Database\Seeder;
use App\Athlete;
use App\Sport;

class AthleteBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         # First, create an array of all the books we want to associate tags with
         # The *key* will be the book title, and the *value* will be an array of tags.
         # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
         $athletes =[
             'John Doe' => ['Baseball', 'Soccer', 'Swimming'],
             'Mary Doe' => ['Basketball', 'Baseball'],
             'Michael Smith' => ['Football', 'Baseball', 'Basketball', 'Swimming']
         ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($athletes as $name => $sports) {
            # get the athlete
            $athlete = Athlete::where('name', 'LIKE', $name)->first();

            #loop through each sport for this athlete, adding the pivot
            foreach ($sports as $sportName) {
                $sport = Sport::where('name', 'LIKE', $sportName)->first();

                #connect this sport to this athlete
                $athlete->sports()->save($sport);
            }
        }
    }
}
