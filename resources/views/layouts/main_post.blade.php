@foreach($rankings as $ranking)
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
            <p>Ranking:{{ $ranking['rank']}} </p>
            <p>Votes:{{ $ranking['votes']}} </p>
            <p>Sport:{{ $ranking['sport']}} </p>
            <p>Position: {{ $ranking['position']}}</p>
            <p>Name: </p>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
            <p><iframe width="440" height="125" src="{{ $ranking['video_link'] }}" frameborder="0"
                allowfullscreen></iframe><p>
        </div>
      </div>
    </div>
@endforeach
