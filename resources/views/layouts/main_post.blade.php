@foreach($videos as $video)
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
            <p>Ranking:{{ $video['rank'] }} </p>
            <p>Votes:{{ $video['votes'] }} </p>
            <p>Sport:{{ $video['sport']['name'] }} </p>
            <p>Position: {{ $video['position'] }}</p>
            <p>Athlete: <a href='/show-athlete/{{$video['athlete_id'] }}'>{{ $video['athlete']['name'] }}</a></p>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
            <p><iframe width="440" height="125" src="{{ $video['video_link'] }}" allowfullscreen></iframe><p>
        </div>
      </div>
    </div>
@endforeach
