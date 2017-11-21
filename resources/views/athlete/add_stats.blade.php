@extends('layouts.master')


@section('title')
    Scouted - Add Video
@endsection


@section('content')
    <div class="container">

        <form class="form-horizontal" method='POST' action='/store-stats'>
            <h2> Add Stats </h2>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

                        <!-- input to enter stat description link -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="score_description">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="score_description" name='score_description'
                        placeholder="touchdown..." required="required" value='{{old('score_description')}}'>
                    @include('modules.error-field', ['fieldName' => 'score_description'])
                </div>
            </div>

            <!-- input to enter value -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="score">Value</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="score" name='score'
                        placeholder="5..." required="required" value='{{old('score')}}'>
                    @include('modules.error-field', ['fieldName' => 'score'])
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

            <!-- input to enter match name -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="match_name">Match Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="match_name" name='match_name'
                        value='{{old('match_name')}}'>
                    @include('modules.error-field', ['fieldName' => 'match_name'])
                </div>
            </div>

            <!-- input to enter match date -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="match_date">Match Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="match_date" name='match_date'
                        placeholder="dd/mm/yyyy" value='{{old('match_date')}}'>
                    @include('modules.error-field', ['fieldName' => 'match_date'])
                </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class='btn btn-primary btn-small' value='Add Stats'>
              </div>
            </div>
	    </form>
	</div>
@endsection
