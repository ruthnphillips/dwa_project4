@extends('layouts.master')


@section('title')
    Scouted
@endsection


@section('content')
    <div class="container">
        <!-- display result -->
        <h2>Registration Successful</h2>
        <ul>
            <li>First Name: {{$athlete['first_name']}}</li>
            <li>Last Name: {{$athlete['last_name']}}</li>
            <li>email: {{$athlete['email']}}</li>
            <li>Gender: {{$athlete['gender']}}</li>
            <li>School: {{$athlete['school_name']}}</li>
            <li>gpa: {{$athlete['gpa']}}</li>
        </ul>
    </div>
@endsection
