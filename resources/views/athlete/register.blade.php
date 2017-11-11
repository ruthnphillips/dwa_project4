@extends('layouts.master')


@section('title')
    Scouted
@endsection


@section('content')
    <div class="container">
        <form method='GET' action='/athlete-register-submit'>
            
                <!-- input to enter first name -->
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="first_name">First Name </label>
                    <input type='text' class='form-control' id='first_name' name='first_name'
                       placeholder="(required)" value='{{old('first_name')}}' >
                    @include('modules.error-field', ['fieldName' => 'first_name'])
                </div>
            </div>
                <!-- input to enter last name -->
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="last_name">Last Name </label>
                    <input type='text' class='form-control' id='last_name' name='last_name'
                       placeholder="(required)" value='{{old('last_name')}}' >
                    @include('modules.error-field', ['fieldName' => 'last_name'])
                </div>
            </div>
                <!-- input to enter email address -->
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="email">email </label>
                    <input type='text' class='form-control' id='email' name='email'
                       placeholder="(required) name@example.com" value='{{old('email')}}' >
                    @include('modules.error-field', ['fieldName' => 'email'])
                </div>
            </div>
            <!-- radio button to choose gender (Male/Female) -->
            <div class='row'>
                <div class='form-group col-sm-8'>
                    <label>Gender</label>
                    <div>
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
            </div>
                <!-- input to enter School -->
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="school_name">School Name </label>
                    <input type='text' class='form-control' id='school_name' name='school_name'
                        value='{{old('school_name')}}' >
                </div>
            </div>
                <!-- input to enter GPA -->
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="gpa">GPA </label>
                    <input type='text' class='form-control' id='gpa' name='gpa'
                        placeholder="3.25" value='{{old('gpa')}}' >
                    @include('modules.error-field', ['fieldName' => 'gpa'])
                </div>
            </div>
            <input type='submit' class='btn btn-primary btn-small' value='Submit'>
	    </form>
	</div>
@endsection
