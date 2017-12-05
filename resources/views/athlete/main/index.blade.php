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
                @include('layouts.main_post', ['videos' => $videos])
            </div>
            @include('layouts.main_rightbar', ['new_videos' => $new_videos])
        </div>
    </div>
@endsection
