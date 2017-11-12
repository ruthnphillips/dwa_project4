<?php

namespace App\Http\Controllers;

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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'gpa'=>'nullable|numeric|between:0,5'
        ]);


        # ToDo: Add code to enter athlete into database


        $first_name = $request->input('first_name');

        #return redirect('/athlete/success);
        return redirect('/athlete/success')->with([
            'first_name'=>$first_name
        ]);
    }

    // //GET /athlete/success
    public function success()
    {
        return view('athlete.success')-> with([
            'first_name' => session('first_name')
        ]);
    }

    //    //GET /add-video
    public function addVideo()
    {
        return view('athlete.add_video');
    }

    //  //Post /store-video
    public function storeVideo(Request $request)
    {

        #Validate the form entries
        $this->validate($request, [
            'video_link'=>'required|url',
            'sport'=>'required',
            'position'=>'required',
            'submitted'=>'required',
            'email'=>'required|email'
        ]);


        # ToDo: Add code to enter video into database


        $email = $request->input('email');

        #return redirect('/athlete/success);
        return redirect('/athlete/success')->with([
            'first_name'=>$email
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
            'description'=>'required',
            'value'=>'required|numeric',
            'email'=>'required|email'
        ]);


        # ToDo: Add code to enter video into database


        $email = $request->input('email');

        #return redirect('/athlete/success);
        return redirect('/athlete/success')->with([
            'first_name'=>$email
        ]);
    }
}
