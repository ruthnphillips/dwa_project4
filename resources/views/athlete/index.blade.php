@extends('layouts.athletesocial')


@section('title')
    Scouted
@endsection


@section('content')
    <div class="container">
        <div class="row">
            {{-- Include left bar file --}}
            @include('layouts.main_leftbar')

            <div class="col-sm-7">
                {{-- display result --}}
                {{-- @include('layouts.status_bar', ['athlete' => $athlete]) --}}
                @include('layouts.main_post', ['rankings' => $rankings])
            </div>
            @include('layouts.main_rightbar', ['video' => $videos])
        </div>
    </div>
@endsection
