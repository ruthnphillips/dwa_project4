@extends('layouts.master')


@section('title')
    Scouted - Add Video
@endsection


@section('content')
    <div class="container">
        <h2> Add Video </h2>
        <form class="form-horizontal" method='POST' action='/store-video'>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

            <!-- input to enter video link -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="video_link">Video Link</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="video_link" name='video_link'
                        required="required" value='{{old('video_link')}}'>
                    @include('modules.error-field', ['fieldName' => 'video_link'])
                </div>
            </div>

            <!-- dropdown input to select sport -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="sport">Sport</label>
                <div class="col-sm-10">
                    <select class="form-control" id="sport" name="sport">
                        <option @if(old('sport') == 'Baseball')selected @endif>Baseball</option>
                        <option @if(old('sport') == 'Basketball')selected @endif>Basketball</option>
                        <option @if(old('sport') == 'Football')selected @endif>Football</option>
                    </select>
                </div>
            </div>

            <!-- input to enter position -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="position">Position</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="position" name='position'
                        placeholder="example: quarterback" required="required" value='{{old('position')}}'>
                    @include('modules.error-field', ['fieldName' => 'position'])
                </div>
            </div>

            <!-- radio button to select if video is to be submitted for voting -->
            <div class='form-group required'>
                <label class="control-label col-sm-2">Submit for Voting?</label>
                <div class="col-sm-10">
                    <label class="radio-inline" for="no">
                        <input type="radio" name="submitted" id = "no" value="1" @if(old('submitted')) checked @endif>
                         No
                    </label>
                    <label class="radio-inline" for="yes">
                        <input type="radio" name="submitted" id = "yes" value="0" @if(!old('submitted')) checked @endif>
                        Yes
                    </label>
                </div>
            </div>

            <!-- input to enter email address -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name='email'
                        required="required" value='{{old('email')}}'>
                    @include('modules.error-field', ['fieldName' => 'email'])
                </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class='btn btn-primary btn-small' value='Add Video'>
              </div>
            </div>
	    </form>
	</div>
@endsection
