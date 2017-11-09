<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AthletesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(StatsTableSeeder::class);
        $this->call(VideoRankingsTableSeeder::class);
    }
}
