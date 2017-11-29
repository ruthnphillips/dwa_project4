<div class="col-sm-3 well">
  <div class="well">
    <h4>Profile</h4>
    <p>Name: {{$athlete->name}}</p>
    <p>School: {{$athlete->school}}</p>
    <p>Gender: {{$athlete->gender}}</p>
    <p>email:  {{$athlete->email}}</p>
    <a href='/edit-athlete/{{$athlete->id}}'><span class="label label-primary">Update</span></a>
  </div>
  <div class="well">
    <h4>Videos</h4>
    <p><a href="/add-video/{{$athlete->id}}">Add Video</a></p>
    <p>
      <span class="label label-default">Sport</span>
      <span class="label label-primary">Rank</span>
    </p>
  </div>
  <div class="well">
    <h4>Stats</h4>
    <p><a href="/add-stats/{{$athlete->id}}">Add Stats</a></p>
    <p>
      <span class="label label-default">Sport</span>
      <span class="label label-primary">Rank</span>
    </p>
  </div></div>
