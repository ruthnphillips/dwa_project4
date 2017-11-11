<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AthleteController extends Controller
{
    //    //GET /athlete-register-form
    public function registerForm()
    {
        return view('athlete.register');
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
}
