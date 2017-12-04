<?php

use Illuminate\Database\Seeder;
use App\Stat;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stats = [
            [1, 1, 'McKinney vs Oakley', 2017, 5, 25, 'Hits', 5],
            [2, 3, 'Oakland vs McKinney', 2017, 7, 1, 'Rebounds', 15],
            [3, 4, 'Ascension vs Sherman', 2017, 2, 12, 'touchdown', 2],
            [4, 5, 'Plano vs Milpart', 2017, 8, 19, 'yards', 50],
        ];

        $count = count($stats);

        foreach ($stats as $key => $stat) {
            Stat::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'athlete_id' => $stat[0],
                'video_id' => $stat[1],
                'match_name' => $stat[2],
                'match_date' => Carbon\Carbon::createFromDate($stat[3], $stat[4], $stat[5]),
                'score_description' => $stat[6],
                'score' => $stat[7]
            ]);
            $count--;
        }
    }
}
