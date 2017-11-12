@extends('layouts.master')


@section('title')
    Scouted - register
@endsection


@section('content')
    <div class="container">
        <h2> Athlete Registration </h2>
        <form class="form-horizontal" method='POST' action='/store-athlete'>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

            <!-- input to enter first name -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="first_name">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" name='first_name'
                        required="required" value='{{old('first_name')}}'>
                    @include('modules.error-field', ['fieldName' => 'first_name'])
                </div>
            </div>

            <!-- input to enter last name -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="last_name">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name='last_name'
                        required="required" value='{{old('last_name')}}'>
                    @include('modules.error-field', ['fieldName' => 'last_name'])
                </div>
            </div>

            <!-- input to enter email address -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name='email'
                        required="required" value='{{old('email')}}'>
                    @include('modules.error-field', ['fieldName' => 'email'])
                </div>
            </div>

            <!-- radio button to choose gender (Male/Female) -->
            <div class='form-group required'>
                <label class="control-label col-sm-2" for="Last_name">Gender</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="1" @if(old('gender')) checked @endif>
                         Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="0" @if(!old('gender')) checked @endif>
                        Female
                    </label>
                </div>
            </div>

            <!-- input to enter School -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="Last_name">School</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="school_name" name='school_name'
                        value='{{old('school_name')}}'>
                    @include('modules.error-field', ['fieldName' => 'school_name'])
                </div>
            </div>
                <!-- input to enter GPA -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="gpa">GPA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gpa" name='gpa'
                        placeholder="0-5" value='{{old('gpa')}}'>
                    @include('modules.error-field', ['fieldName' => 'gpa'])
                </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class='btn btn-primary btn-small' value='Submit'>
              </div>
            </div>
	    </form>
	</div>
@endsection
