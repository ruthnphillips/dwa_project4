@extends('layouts.athletesocial')


@section('title')
    Scouted - Delete Video
@endsection


@section('content')
    <div class="container">
        <h2> Confirm Delete: are you sure you want to delete? </h2>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
                <form method='POST' action='/destroy-video/{{$video->id}}'>
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <input type='submit' value='Destroy it!' class='btn btn-danger btn-small'>
                </form>
                <div>
                    <p class='cancel'>
                        <a href='{{ $previousUrl }}'>Nope, changed my mind.</a>
                    </p>
                </div>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="well">
                <p><iframe width="440" height="125" src="{{ $video->video_link }}" allowfullscreen></iframe><p>
            </div>
          </div>
      </div>
	</div>
@endsection
