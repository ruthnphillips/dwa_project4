<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <p contenteditable="true">
            @if(session('alert'))
                <div class='alert alert-success'>
                    {{ session('alert') }}
                </div>
            @else
                <h3>hello, you have {{ $count}} video(s).</h3>
            @endif
        </p>
      </div>
    </div>
  </div>
</div>
