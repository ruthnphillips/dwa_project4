@foreach($videos as $video)
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
        <p>Ranking:{{$video['rank']}}</p>
        <p>Sport: {{$video['sport']}}</p>
        <p>Position:{{$video['position']}} </p>
        <a href='#'><span class="label label-default">Vote</span></a>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
            {{-- <p>  {!! $video['video_link'] !!} </p>--}}
            <p><iframe width="440" height="315" src="{{ $video['video_link'] }}" frameborder="0"
                allowfullscreen></iframe><p>
        </div>
      </div>
    </div>
@endforeach
