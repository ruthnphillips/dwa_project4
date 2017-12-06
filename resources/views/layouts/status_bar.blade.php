<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <h2>
            <contenteditable="true">
                @if(session('alert'))
                    <div class='alert alert-success'>
                        {{ session('alert') }}
                    </div>
                @else
                    hello, you have {{ $count}} video(s).
                @endif
        </h2>
      </div>
    </div>
  </div>
</div>
