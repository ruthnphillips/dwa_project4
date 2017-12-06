<div class="col-sm-2 well">
  <div class="thumbnail">
    <h5>recently added..</h5>
  </div>
  @foreach($new_videos as $video)
    <div class="well">
        <iframe width="120" height="50" src="{{ $video['video_link'] }}" allowfullscreen></iframe>
        <p> added:{{$video['created_at']}}
    </div>
  @endforeach
</div>
