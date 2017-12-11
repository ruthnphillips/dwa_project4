<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#home page
Route::get('/', 'AthleteController@index');

#add a new athlete
Route::get('/add-athlete', 'AthleteController@addAthlete');
Route::post('/store-athlete', 'AthleteController@storeAthlete');

#show athlete page
Route::get('/show-athlete/{id}', 'AthleteController@showAthlete');

#edit athlete profile
Route::get('/edit-athlete/{id}', 'AthleteController@editAthlete');
Route::put('/update-athlete/{id}', 'AthleteController@updateAthlete');

#add video
Route::get('/add-video/{id}', 'AthleteController@addVideo');
Route::post('/store-video/{id}', 'AthleteController@storeVideo');

#edit video information
Route::get('/edit-video/{id}', 'AthleteController@editVideo');
Route::put('/update-video/{id}', 'AthleteController@updateVideo');

#delete video
Route::get('/delete-video/{id}', 'AthleteController@deleteVideo');
Route::delete('/destroy-video/{id}', 'AthleteController@destroyVideo');

#send voting link
Route::get('/send-vote-link/{id}', 'AthleteController@sendVoteLink');
Route::post('/send-vote-email/{id}', 'AthleteController@sendVoteEmail');

#tally vote
Route::get('/add-vote/{id}', 'AthleteController@addVote');

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
