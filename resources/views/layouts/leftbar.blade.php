<div class="col-sm-3 well">
  <div class="well">
    <h4>My Profile</h4>
    <p>Name: {{$athlete->name}}</p>
    <p>School: {{$athlete->school}}</p>
    <p>Gender: {{$athlete->gender}}</p>
    <p>email:  {{$athlete->email}}</p>
    <p class="label label-primary">update</p>
  </div>
  <div class="well">
    <h4>My Videos</h4>
    <p><a href="/add-video/{{$athlete->id}}">Add Video</a></p>
    <p>
      <span class="label label-default">Sport</span>
      <span class="label label-primary">Rank</span>
    </p>
  </div>
  <p><a href="#">Link</a></p>
</div>
