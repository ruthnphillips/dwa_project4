@extends('layouts.athletesocial')


@section('content')
    <div class="container text-center">
        <div class="row">
            @include('layouts.leftbar') {{-- Include left bar file --}}

            <div class="col-sm-7">
                {{-- populate the status --}}
                @include('layouts.status_bar', ['myRank' => 'I am no 1'])

                {{-- populate video posts --}}
                @include('layouts.post')
            </div>

            {{-- populate right bar  --}}
            @include('layouts.rightbar')
        </div>
    </div>
@endsection


@push('body')
    <script src="/js/books/show.js"></script>
@endpush
