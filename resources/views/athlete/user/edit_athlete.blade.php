@extends('layouts.master')


@section('title')
    Scouted - register
@endsection


@section('content')
    <div class="container">
        <form class="form-horizontal" method='POST' action='/update-athlete/{{$athlete->id}}'>
            <h2 class="text-center"> Athlete Registration </h2>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

            <!-- input to enter name -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name='name'
                        required="required" value='{{old('name', $athlete->name)}}'>
                    @include('modules.error-field', ['fieldName' => 'name'])
                </div>
            </div>

            <!-- input to enter email address -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name='email'
                        required="required" value='{{old('email', $athlete->email)}}'>
                    @include('modules.error-field', ['fieldName' => 'email'])
                </div>
            </div>

            <!-- radio button to choose gender (Male/Female) -->
            <div class='form-group required'>
                <label class="control-label col-sm-2">Gender</label>
                <div class="col-sm-10">
                    <label class="radio-inline" for="male">
                        <input type="radio" name="gender" id="male" value="male" @if(old('gender')) checked @endif>
                         Male
                    </label>
                    <label class="radio-inline" for="female">
                        <input type="radio" name="gender" id="female" value="female" @if(!old('gender')) checked @endif>
                        Female
                    </label>
                </div>
            </div>

            <!-- input to enter School -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="school">School</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="school" name='school'
                        value='{{old('school', $athlete->school)}}'>
                    @include('modules.error-field', ['fieldName' => 'school'])
                </div>
            </div>
                <!-- input to enter GPA -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="gpa">GPA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gpa" name='gpa'
                        placeholder="0-5" value='{{old('gpa', $athlete->gpa)}}'>
                    @include('modules.error-field', ['fieldName' => 'gpa'])
                </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class='btn btn-primary btn-small' value='Update'>
              </div>
            </div>
	    </form>
	</div>
@endsection
