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
                @include('layouts.main_post', ['rankings' => $rankings, 'newrankings' => $newrankings])
            </div>
            @include('layouts.main_rightbar', ['video' => $videos])
        </div>
    </div>
@endsection
