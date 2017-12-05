@extends('layouts.athletesocial')

@section('title')
    Scouted - Send Voting Link
@endsection


@section('content')
    <div class="container">
        <form class="form-horizontal" method='POST' action='/send-vote-email/{{$video->id}}'>
            <h2 class="text-center"> Send Email to Friends to Vote for your Video </h2>

            {{ csrf_field() }}

            <div class='details'>* Required fields</div>

            <!-- input to enter recipients -->
            <div class="form-group required">
                <label class="control-label col-sm-2" for="recipients">To:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipients" name='recipients'
                        placeholder="example: abc@example.com" required="required" value='{{old('recipients')}}'>
                    @include('modules.error-field', ['fieldName' => 'recipients'])
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

            <!-- input to enter Message -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="message">Message:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="message" name='message'
                    value='{{old('message')}}'>
                    @include('modules.error-field', ['fieldName' => 'message'])
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
