<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sports = [
            ['Baseball'],
            ['Basketball'],
            ['Football'],
        ];

        $count = count($sports);

        foreach ($sports as $key => $sport) {
            Sport::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $sport[0],
            ]);
            $count--;
        }
    }
}
