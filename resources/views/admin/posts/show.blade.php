@extends('layouts.app')
@section('content')
<div class="admin-posts-show row">
    <div class="box-side-bar col-2">
        <div class="">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
        <div class="side-bar ">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{route('admin.posts.index')}}">Posts</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Tags</a></li>
            </ul>
        </div>
    </div>

    <div class="col-10 text-center pt-4">


        <div class="new-post">
            <a href="{{route('admin.posts.create')}}">Nuovo post</a>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Titolo: {{ $post->title }}</div>
                    <h4>Category:
                        @if($post->category)
                        <a href="{{ route('category.index', ['slug' => $post->category->slug ])}}">
                            {{$post->category->name}}
                        </a>
                        @endif
                    </h4>
                    <img src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
                    <div class="card-body">
                        Contenuto: {{ $post->content }}
                        <div class="">
                            <a class="btn btn-info" href="{{route('admin.posts.show', ['post'=> $post->id])}}">Show</a>
                            <a class="btn btn-info" href="{{route('admin.posts.edit', ['post'=> $post->id])}}">Edit</a>

                            <a class="btn btn-danger" onclick="event.preventDefault();
                            this.nextElementSibling.submit();"> Delete</a>
                            <form action="{{ route('admin.posts.destroy',['post' => $post->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
