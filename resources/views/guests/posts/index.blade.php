@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
      @foreach ($posts as $post)

            <div class="card col-3 py-4 pr-4 my-4 mx-4">
                <div class="card-header">{{ $post->slug }}</div>

                <div class="card-body">
                    {{ $post->content }}
                    <div class="">
                      <a class="btn btn-info" href="{{ route('posts.show', ['slug'=> $post->slug]) }}">Read more</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection
