<?php

namespace App\Http\Controllers;

use App\Athlete;
use App\Sport;
use App\Stat;
use App\Video;
use App\VideoRanking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class AthleteController extends Controller
{
    //    /
    public function index()
    {
        // get the 4 most recent videos added
        $videos = Video::orderBy('created_at', 'desc')->limit(3)->get();

        //sort video by Ranking
        $count = Sport::all()->count();
        $rankings = Video::orderBy('rank')->orderBy('sports_id')->limit($count)->get();

        $temptable = \DB::update('UPDATE videos dest, (SELECT a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id,
                        count(b.votes)+1 as ranktemp
                FROM  videos a left join videos b on a.sports_id=b.sports_id and a.votes<b.votes
                group by a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id) src
                SET dest.rank = src.ranktemp
                WHERE dest.id = src.id');
$newrankings = Video::orderBy('rank')->orderBy('sports_id')->limit($count)->get();
        return view('athlete.main.index')->with([
            'videos'=>$videos,
            'rankings'=>$rankings,
            'newrankings'=>$newrankings
        ]);
    }

        //    //GET /add-athlete
    public function addAthlete()
    {
        return view('athlete.main.add_athlete');
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

        $newAthlete = Athlete::where('email', '=', $athlete->email)->first();
        $videos = Video::where('athletes_id', '=', $newAthlete->id);
        $stats = Stat::where('athletes_id', '=', $newAthlete->id)->get();


        return view('athlete.user.show')->with([
            'athlete'=>$newAthlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
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
        $sports = Sport::all();
        return view('athlete.user.add_video')->with([
            'athlete'=>$athlete,
            'sportstype'=>$sports
        ]);
    }

    //  //Post /store-video/{$id}
    public function storeVideo(Request $request, $id)
    {

        #Validate the form entries
        $this->validate($request, [
            'video_link'=>'required|url',
            'sport'=>'required',
            'position'=>'required',
            'submitted'=>'required'
        ]);

        # Add new video to the database
        $video = new Video();
        $video->athletes_id = $id;
        $video->sports_id = $request->input('sport');
        $video->position = $request->input('position');
        $video->submitted = $request->input('submitted');
        $video->video_link = $request->input('video_link');
        $video->voting_link = $request->input('voting_link');
        $video->save();
        $athlete = Athlete::find($id);
        $videos = Video::where('athletes_id', '=', $id)->get();
        $stats = Stat::where('athletes_id', '=', $id)->get();

        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
    }

    //  //Get /edit-video/{$id}
    public function editVideo($id)
    {
        $video = Video::find($id);
        $sports = Sport::all();
        return view('athlete.user.edit_video')->with([
            'video'=>$video,
            'sportstype'=>$sports
        ]);
    }

    //  //Post /update-video/{$id}
    public function updateVideo(Request $request, $id)
    {

        #Validate the form entries
        $this->validate($request, [
            'video_link'=>'required|url',
            'sport'=>'required',
            'position'=>'required',
            'submitted'=>'required'
        ]);

        # update video info in the database
        $video = Video::find($id);
        $video->sports_id = $request->input('sport');
        $video->position = $request->input('position');
        $video->submitted = $request->input('submitted');
        $video->video_link = $request->input('video_link');
        $video->voting_link = $request->input('voting_link');
        $video->save();

        $athlete = Athlete::find($video->athletes_id);
        $videos = Video::where('athletes_id', '=', $athlete->id)->get();
        $stats = Stat::where('athletes_id', '=', $athlete->id)->get();

        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
    }

    //  //Get /delete-video/{$id}
    public function deleteVideo($id)
    {
        $video = Video::find($id);
        $athlete = Athlete::find($video->athletes_id);
        $result = Video::destroy($id);

        $temptable = \DB::update('UPDATE videos dest, (SELECT a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id,
                        count(b.votes)+1 as ranktemp
                FROM  videos a left join videos b on a.sports_id=b.sports_id and a.votes<b.votes
                group by a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id) src
                SET dest.rank = src.ranktemp
                WHERE dest.id = src.id');

        $videos = Video::where('athletes_id', '=', $athlete->id)->get();
        $stats = Stat::where('athletes_id', '=', $athlete->id)->get();

        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
    }

    //    //GET /add-stats/{id}
    public function addStats($id)
    {
        return view('athlete.user.add_stats')->with(['id' => $id]);
    }

    //  //Post /store-stats/{id}
    public function storeStats(Request $request, $id)
    {

        #Validate the form entries
        $this->validate($request, [
            'score_description'=>'required',
            'score'=>'required|numeric',
            'match_date'=>'nullable|date_format:d/m/Y'
        ]);

        # Add new stats to the database
        $stat = new Stat();
        $stat->athletes_id = $id;
        $stat->match_name = $request->input('match_name');
        $stat->match_date = Carbon::parse($request->input('match_date'));
        $stat->score_description = $request->input('score_description');
        $stat->score = $request->input('score');
        $stat->save();

        $athlete = Athlete::find($id);
        $videos = Video::where('athletes_id', '=', $id)->get();
        $stats = Stat::where('athletes_id', '=', $id)->get();


        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
    }

    //  //Post /add_vote/{$video_id}
    public function addVote($video_id)
    {
        # find corresponding video entry in videos table and increment vote by 1
        $video = Video::find($video_id);
        $video->votes += 1;
        $video->save();
        $temptable = \DB::update('UPDATE videos dest, (SELECT a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id,
                        count(b.votes)+1 as ranktemp
                FROM  videos a left join videos b on a.sports_id=b.sports_id and a.votes<b.votes
                group by a.video_link,
                      a.votes,
                      a.sports_id,
                      a.position,
                      a.id) src
                SET dest.rank = src.ranktemp
                WHERE dest.id = src.id');

        $athlete = Athlete::find($video->athletes_id);
        $videos = Video::where('athletes_id', '=', $athlete->id)->get();
        $stats = Stat::where('athletes_id', '=', $athlete->id)->get();

        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count(),
            'stats' =>$stats

        ]);
    }

    public function senVoteLink(Request $request, $video_id)
    {
    }
}
