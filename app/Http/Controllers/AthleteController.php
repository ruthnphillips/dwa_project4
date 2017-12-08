<?php

namespace App\Http\Controllers;

use App\Athlete;
use App\Sport;
use App\Video;
use App\VideoRanking;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;
use Session;

class AthleteController extends Controller
{
    //    /
    public function index()
    {

        //sort video by Ranking
        Video::rankVideo();
        $count = Sport::all()->count();
        $videos = Video::orderBy('rank')->orderBy('sport_id')->limit($count)->get();

        // get the 3 most recent videos added
        $new_videos = Video::orderBy('created_at', 'desc')->limit(3)->get();

        return view('athlete.main.index')->with([
            'new_videos'=>$new_videos,
            'videos'=>$videos
        ]);
    }

        //    //GET /add-athlete
    public function addAthlete()
    {
        $sportsForCheckboxes = Sport::getForCheckboxes();
        return view('athlete.main.add_athlete')->with([
            'sportsForCheckboxes' => $sportsForCheckboxes
        ]);
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
        $athlete->sports()->sync($request->input('sports'));
        return redirect('/show-athlete/'.$athlete->id)->with('alert', 'Welcome '. $athlete->name. '!!');
    }

    // //GET /show-athlete/{id}
    public function showAthlete($id)
    {
        $athlete = Athlete::find($id);
        $videos = Video::where('athlete_id', '=', $id)->get();

        return view('athlete.user.show')->with([
            'athlete'=>$athlete,
            'videos'=>$videos,
            'count' =>$videos->count()
        ]);
    }
    //    //GET /edit-athlete
    public function editAthlete($id)
    {
        $athlete = Athlete::find($id);
        return view('athlete.user.edit_athlete')->with(['athlete'=>$athlete]);
    }

    //  //Post /update-athlete
    public function updateAthlete(Request $request, $id)
    {

        #Validate the form entries
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'gpa'=>'nullable|numeric|between:0,5'
        ]);

        # Add new athlete to the database
        $athlete = Athlete::find($id);
        $athlete->name = $request->input('name');
        $athlete->email = $request->input('email');
        $athlete->gender = $request->input('gender');
        $athlete->school = $request->input('school');
        $athlete->gpa = $request->input('gpa');
        $athlete->save();
        return redirect('/show-athlete/'.$id)->with('alert', 'Profile updated!!');
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
        $athlete = Athlete::find($id);
        $video->athlete_id = $id;
        $video->sport_id = $request->input('sport');
        $video->position = $request->input('position');
        $video->submitted = $request->input('submitted');
        $video->video_link = $request->input('video_link');
        $video->save();

        //sort video by Ranking
        Video::rankVideo();

        return redirect('/show-athlete/'.$id)->with('alert', 'Your video was successfully added!!');
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
        $video->sport_id = $request->input('sport');
        $video->position = $request->input('position');
        $video->submitted = $request->input('submitted');
        $video->video_link = $request->input('video_link');
        $video->voting_link = $request->input('voting_link');
        $video->save();
        //sort video by Ranking
        Video::rankVideo();
        return redirect('/show-athlete/'.$video->athlete_id)->with('alert', 'Your video was updated!!');
    }

    //  //Get /delete-video/{$id}
    public function deleteVideo($id)
    {
        $video = Video::find($id);
        $athlete = Athlete::find($video->athlete_id);
        $result = Video::destroy($id);

        //sort video by Ranking
        Video::rankVideo();

        return redirect('/show-athlete/'.$video->athlete_id)->with('alert', 'Your video was deleted!!');
    }

    //  //Post /add_vote/{$video_id}
    public function addVote($video_id)
    {
        # find corresponding video entry in videos table and increment vote by 1
        $video = Video::find($video_id);
        $video->votes += 1;
        $video->save();
        //sort video by Ranking
        Video::rankVideo();
        return redirect('/show-athlete/'.$video->athlete_id)->with('alert', 'Thanks for voting!!');
    }

    public function sendVoteLink($video_id)
    {
        $video = Video::find($video_id);
        return view('athlete.user.send_vote_link')->with([
            'video'=>$video
        ]);
    }

    public function sendVoteEmail(Request $request, $video_id)
    {
        #Validate the form entries
        $this->validate($request, [
            'email'=>'required|email'
        ]);
        $email = $request->input('email');
        $video = Video::find($video_id);

        # use email.voteEmail view
        Mail::send('email.voteEmail', [
        'subject'=>$request->input('subject'),
        'video'=> $video],
        function($message) use ($email){
            $message->to($email)
            ->subject(config('app.name'));
        });
        return redirect('/show-athlete/'.$video->athlete_id)->with('alert', 'email sent to '. $email);
    }
}
