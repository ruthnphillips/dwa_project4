@extends('layouts.master')


@section('title')
    Scouted
@endsection


@section('content')
    <div class="container">
        @foreach($videos as $video)
        <p>  {!! $video['video_link'] !!} </p>
        @endforeach
    </div>
@endsection
