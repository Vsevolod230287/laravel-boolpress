@extends('layouts.admin.app')

@section('content')
<div class="admin-posts-index row">
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
            @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header">{{$post->title}}</div>

                    <div class="card-body d-flex flex-column">
                        <div class="pb-2">
                            {{$post->content}}

                        </div>
                        <div class="d-flex justify-content-around">

                            <div class="">
                                <a class="btn btn-info" href="{{route('admin.posts.show', ['post' => $post->id])}}">Show</a>
                            </div>
                            <div class="">
                                <a class="btn btn-info" href="{{route('admin.posts.destroy', ['post' => $post->id])}}">Delete</a>
                            </div>
                            <div class="">
                                <a class="btn btn-info" href="{{route('admin.posts.edit', ['post' => $post->id])}}">Edit</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
