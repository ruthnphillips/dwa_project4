<?php

namespace App\Http\Controllers;

use App\Athlete;
use App\Stat;
use App\Video;
use App\VideoRanking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class AthleteController extends Controller
{
    //    //GET /add-athlete
    public function addAthlete()
    {
        return view('athlete.add_athlete');
    }


    //  //Post /store-athlete
    public function storeAthlete(Request $request)
    {

        #Validate the form entries
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:athletes,email',
            'gpa'=>'nullable|numeric|between:0,5'
        ]);

        # Add new athlete to the database
        $athlete = new Athlete();
        $athlete->name = $request->input('name');
        $athlete->email = $request->input('email');
        $athlete->gender = $request->input('gender');
        $athlete->school = $request->input('school');
        $athlete->gpa = $request->input('gpa');
        $athlete->save();

        $newEntry = Athlete::where('email', '=', $athlete->email)->first();
    #    return redirect('/athlete/success')->with([
    #            'athlete'=>$newAthlete
    #        ]);
        return view('athlete.show')->with(['athlete'=> $newEntry]);
    }

    // //GET /athlete/success
    public function success()
    {
        return view('athlete.success')-> with([
            'athlete' => session('athlete')
        ]);
    }

    //    //GET /add-video/{$id}
    public function addVideo($id)
    {
        $athlete = Athlete::find($id);
        return view('athlete.add_video')->with(['athlete'=>$athlete]);
    }

    //  //Post /store-video/{$id}
    public function storeVideo(Request $request, $id)
    {

        #Validate the form entries
        $this->validate($request, [
            'video_link'=>'required',
            'sport'=>'required',
            'position'=>'required',
            'submitted'=>'required'
        ]);

        # Add new video to the database
        $video = new Video();
        $video->athletes_id = $id;
        $video->sport = $request->input('sport');
        $video->position = $request->input('position');
        $video->submitted = $request->input('submitted');
        $video->video_link = $request->input('video_link');
        $video->voting_link = $request->input('voting_link');
        $video->save();

        $athlete = Athlete::find($id);
        $videos = Video::where('athletes_id', '=', $id)->get();

        return view('athlete.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos
        ]);
    }

    //    //GET /add-stats
    public function addStats()
    {
        return view('athlete.add_stats');
    }

    //  //Post /store-stats
    public function storeStats(Request $request)
    {

        #Validate the form entries
        $this->validate($request, [
            'score_description'=>'required',
            'score'=>'required|numeric',
            'email'=>'required|email|exists:athletes,email',
            'match_date'=>'nullable|date_format:d/m/Y'
        ]);


        # Query DB to retrieve athlete ID if exists
        $athlete_id = Athlete::where('email', '=', $request->input('email'))->value('id');

        # Add new stats to the database
        $stat = new Stat();
        $stat->athletes_id = $athlete_id;
        $stat->match_name = $request->input('match_name');
        $stat->match_date = Carbon::parse($request->input('match_date'));
        $stat->score_description = $request->input('score_description');
        $stat->score = $request->input('score');
        $stat->save();

        return redirect('/athlete/success')->with([
            'first_name'=>'successfully added stats'
        ]);
    }
}
