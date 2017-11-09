<?php

use Illuminate\Database\Seeder;
use App\VideoRanking;

class VideoRankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videoRankings = [
            [1, 1, 5],
            [2, 1, 15],
            [3, 1, 2],
            [4, 1, 50],
        ];

        $count = count($videoRankings);

        foreach ($videoRankings as $key => $videoRanking) {
            VideoRanking::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'videos_id' => $videoRanking[0],
                'rank' => $videoRanking[1],
                'votes' => $videoRanking[2]
            ]);
            $count--;
        }
    }
}
