@extends('layouts.master')


@section('title')
    Shelter Finder Results
@endsection


@section('content')
    <div class="container">

        <!-- display result -->
        @if($numShelter == 0)
            <div class='alert alert-warning'> Sorry, there are no vacancies</div>
        @else
            <h2>Result: {{$numShelter}} Shelter(s) Available</h2>
            @foreach ($shelters as $name => $shelter)
                <ul>
                    <li>{{$name}}</li>
                    <li>
                        <ul>
                            <li>Maximum Occupancy: {{$shelter['maxOccupancy']}}</li>
                            <li>Persons currentlty in shelter: {{$shelter['currentGuests']}}</li>
                            <li>Pets Allowed: {{$shelter['petsAllowed']}}</li>
                        </ul>
                    </li>
                </ul>
            @endforeach

            <!-- inform user email has been sent -->
            <h4>email sent to : <strong>{{$email}}></strong></h4>
        @endif
    </div>
@endsection
