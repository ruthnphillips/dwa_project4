@extends('layouts.athletesocial')

@section('title')
    Scouted - Send Voting Link
@endsection


@section('content')
    <div class="container">
        <form class="form-horizontal" method='POST' action='/send-vote-email/{{$video->id}}'>
            <h2 class="text-center"> Send Email to Vote for your Video </h2>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

            <!-- input to enter recipient email-->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="email">To:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name='email'
                        placeholder="example: abc@example.com" required="required" value='{{old('email')}}'>
                    @include('modules.error-field', ['fieldName' => 'email'])
                </div>
            </div>

            <!-- input to enter Subject -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="subject">Subject:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" name='subject'
                        required="required" value='Vote for my Video'>
                    @include('modules.error-field', ['fieldName' => 'subject'])
                </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class='btn btn-primary btn-small' value='Send Email'>
              </div>
            </div>
	    </form>
	</div>
@endsection
