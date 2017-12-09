<div class="col-sm-3 well">
    <div class="well">
        <h4>Profile</h4>
        <p>Name: {{ $athlete->name }}</p>
        <p>School: {{ $athlete->school }}</p>
        <p>Gender: {{ $athlete->gender }}</p>
        <p>email:  {{ $athlete->email }}</p>
        <a href='/edit-athlete/{{ $athlete->id }}'><span class="label label-primary">Update</span></a>
    </div>
    <div class="well">
        <h4>Videos</h4>
        <a href="/add-video/{{ $athlete->id }}"><span class="label label-success">Add New Video</span></a>
    </div>
    <div class="well">
        <h4>My Sports</h4>
        <p>
            @foreach( $athlete->sports as $sport)
                <span class="label label-default">{{ $sport['name'] }}</span>
            @endforeach
        </p>
    </div>
</div>
