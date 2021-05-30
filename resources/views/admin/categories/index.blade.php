@extends('layouts.admin.app')

@section('content')
<div class="admin-categories-index row">
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
              <li><a href="{{route('admin.categories.index')}}">categories</a></li>
                <li><a href="#">Tags</a></li>
            </ul>
        </div>
    </div>

    <div class="col-10 text-center pt-4">


        <div class="new-category">
            <a href="{{route('admin.categories.create')}}">Nuovo category</a>
        </div>
        <div class="row justify-content-center">
            @foreach ($categories as $category)
            <div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header">{{$category->name}}</div>

                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-around">

                            <div class="">
                                <a class="btn btn-info" href="{{route('admin.categories.show', ['category' => $category->id])}}">Show</a>
                            </div>
                            <!-- <div class="">
                                <a class="btn btn-info" href="{{route('admin.categories.destroy', ['category' => $category->id])}}">Delete</a>
                            </div> -->
                            <a class="btn btn-danger" onclick="event.preventDefault();
                            this.nextElementSibling.submit();"> Delete</a>
                            <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <div class="">
                                <a class="btn btn-info" href="{{route('admin.categories.edit', ['category' => $category->id])}}">Edit</a>
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
