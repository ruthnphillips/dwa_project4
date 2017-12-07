<?php

use Illuminate\Database\Seeder;
Use App\Athlete;
Use App\Sport;

class AthleteSportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     */
     public function run()
     {
         $myathletes =[
             'John Doe' => ['Baseball', 'Soccer', 'Swimming'],
             'Mary Doe' => ['Basketball', 'Baseball'],
             'Michael Smith' => ['Football', 'Baseball', 'Basketball', 'Swimming']
         ];

        # loop through the above array, creating a new pivot for each athlete to sport
        foreach ($myathletes as $name => $sports) {
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
