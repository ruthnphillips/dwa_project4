<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            [1, 1, 'Pitcher', 1, 'https://www.youtube.com/embed/U9QSWhELDnI', 'http://www.p4.ruthp.me/vote', 1, 20],
            [1, 1, 'Pitcher', 0, 'https://www.youtube.com/embed/l-bpLtYRJmw', 'http://www.p4.ruthp.me/vote', 2, 15],
            [2, 2, 'Pointguard', 1, 'https://www.youtube.com/embed/KgVFeCxrt3w', 'http://www.p4.ruthp.me/vote', 1, 24],
            [3, 3, 'Quarterback', 1, 'https://www.youtube.com/embed/MB1TnJz-Zwk', 'http://www.p4.ruthp.me/vote', 1, 3],
            [4, 3, 'Runningback', 0, 'https://www.youtube.com/embed/E6toRB-yDK0', 'http://www.p4.ruthp.me/vote', 1, 1],
            [4, 1, 'Pitcher', 1, 'https://www.youtube.com/embed/Dd04kTm7KgM', 'http://www.p4.ruthp.me/vote', 3, 4],

        ];

        $count = count($videos);

        foreach ($videos as $key => $video) {
            Video::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'athletes_id' => $video[0],
                'sports_id' => $video[1],
                'position' => $video[2],
                'submitted' => $video[3],
                'video_link' => $video[4],
                'voting_link' => $video[5],
                'rank' => $video[6],
                'votes' => $video[7]
            ]);
            $count--;
        }
    }
}
