@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('admin.posts.create')}}">Nuovo post</a>
    </div>

  </div>
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    {{ $post->content }}
                    <div class="">
                      <a class="btn btn-info" href="{{route('admin.posts.show', ['post'=> $post->id])}}">Show</a>
                      <a class="btn btn-info" href="{{route('admin.posts.edit', ['post'=> $post->id])}}">Edit</a>

                      <a class="btn btn-danger" onclick="event.preventDefault();
                            this.nextElementSibling.submit();">
                            Delete
                      </a>

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
@endsection
