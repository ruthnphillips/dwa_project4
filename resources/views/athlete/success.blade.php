@extends('layouts.athletesocial')


@section('title')
    Scouted
@endsection


@section('content')
    <div class="container text-center">
        <div class="row">
            @include('layouts.leftbar', ['athlete' => $athlete]) {{-- Include left bar file --}}

            <div class="col-sm-7">
                {{-- display result --}}
                @include('layouts.status_bar', ['msg' => $athlete])
                <p> {{$athlete}} </p>
            </div>
        </div>
    </div>
@endsection
