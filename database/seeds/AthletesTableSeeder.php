<?php

use Illuminate\Database\Seeder;
use App\Athlete;

class AthletesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $athletes = [
            ['John Doe', 'johndoe@m.com', 'Male', 'McKinney High Mckinney TX', 3.53],
            ['Mary Doe', 'marydoe@m.com', 'Female', 'McKinney High Mckinney TX', 2.50],
            ['Michael Smith', 'michaelsmith@m.com', 'Male', 'Ascencion Middle Scotts TX', 4.00],
            ['Johnson Doe', 'johnsondoe@m.com', 'Male', 'Plano Middle Plano TX', 3.55],
        ];

        $count = count($athletes);

        foreach ($athletes as $key => $athlete) {
            Athlete::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $athlete[0],
                'email' => $athlete[1],
                'gender' => $athlete[2],
                'school' => $athlete[3],
                'gpa' => $athlete[4]
            ]);
            $count--;
        }
    }
}
