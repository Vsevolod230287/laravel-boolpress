@extends('layouts.app')
@section('content')
<div id="guests-posts-show">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <h4>Category:
                    @if ($post->category)
                    <a href="{{ route('category.index', ['slug' => $post->category->slug])}}">
                        {{$post->category->name}}
                    </a>
                    @endif
                </h4>
                <div class="card-body">
                    {{ $post->content }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
