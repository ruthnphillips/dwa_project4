@extends('layouts.athletesocial')


@section('title')
    Scouted {{$athlete->name}}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            {{-- Include left bar file --}}
            @include('layouts.leftbar', ['athlete' => $athlete])

            <div class="col-sm-7">
                {{-- display result --}}
                @include('layouts.status_bar', ['athlete' => $athlete, 'count'=>$count])
                @include('layouts.post', ['videos' =>$videos])
            </div>
        </div>
    </div>
@endsection
