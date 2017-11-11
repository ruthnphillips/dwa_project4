<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AthleteController extends Controller
{
    //    //GET /athlete-register-form
    public function registerForm()
    {
        return view('athlete.register');
    }

    public function registerFormSubmit(Request $request)
    {
        #Validate the form entries
        $this->validate($request, [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'gpa'=>'nullable|numeric|between:0,5'
        ]);

        $athlete = [];

        # by default guests have no pets
        $gpa = $request->input('gpa');

        foreach ($request as $key => $value)
        {
            $athlete = array_add($request, $key, $value);
        }

        return view('athlete.success')->with([
            'athlete'=>$athlete
        ]);
    }
}
