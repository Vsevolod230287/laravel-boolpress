@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.posts.create')}}">Nuovo post</a>
        </div>
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

@endsection
