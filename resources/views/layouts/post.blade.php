@foreach($videos as $video)
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
        <p>Ranking: {{ $video['rank'] }}</p>
        <p>Votes: {{ $video['votes'] }}</p>
        <p>Sport: {{ $video['sport'] }}</p>
        <p>Position:{{ $video['position'] }} </p>

        @if($video['submitted'])
            <a href='/add-vote/{{$video['id'] }}'><span class="label label-default">Vote</span></a>
        @else
            <span class="label label-primary">No voting allowed</span></a>
        @endif
        <p>
            <a href='/edit-video/{{$video['id'] }}'><span class="label label-default">Update</span></a>
            <a href='/delete-video/{{$video['id'] }}'><span class="label label-danger">Delete</span></a>
        </p>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
            <p><iframe width="440" height="125" src="{{ $video['video_link'] }}" frameborder="0"
                allowfullscreen></iframe><p>
        </div>
      </div>
    </div>
@endforeach
