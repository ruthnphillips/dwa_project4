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
            [1, 'Baseball', 'Pitcher', 1, 'https://www.youtube.com/watch?v=U9QSWhELDnI'],
            [1, 'Baseball', 'Pitcher', 0, 'https://www.youtube.com/watch?v=l-bpLtYRJmw'],
            [2, 'Basketball', 'Pointguard', 1, 'https://www.youtube.com/watch?v=KgVFeCxrt3w'],
            [3, 'Football', 'Quarterback', 1, 'https://www.youtube.com/watch?v=MB1TnJz-Zwk'],
            [4, 'Football', 'Runningback', 0, 'https://www.youtube.com/watch?v=E6toRB-yDK0'],
            [4, 'Baseball', 'Pitcher', 1, 'https://www.youtube.com/watch?v=Dd04kTm7KgM'],

        ];

        $count = count($videos);

        foreach ($videos as $key => $video) {
            Video::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'athletes_id' => $video[0],
                'sport' => $video[1],
                'position' => $video[2],
                'submitted' => $video[3],
                'video_link' => $video[4]
            ]);
            $count--;
        }
    }
}
