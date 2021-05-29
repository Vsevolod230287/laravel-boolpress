@extends('layouts.app')

@section('content')
<div class="admin-posts-create row">
    <div class="box-side-bar col-2 ">
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
                <form action="{{route('admin.posts.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" type="text" name="category_id">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title') }}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"> {{ old('content') }}</textarea>
                        @error('content')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Salva</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
