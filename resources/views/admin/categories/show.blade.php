@extends('layouts.app')
@section('content')
<div class="admin-category-show row">
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
                <li><a href="{{route('admin.categories.index')}}">category</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Tags</a></li>
            </ul>
        </div>
    </div>

    <div class="col-10 text-center pt-4">


        <div class="new-category">
            <a href="{{route('admin.categories.create')}}">Nuovo category</a>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Titolo: {{ $category->name }}</div>

                    <div class="card-body">
                        Contenuto: {{ $category->content }}
                        <div class="">
                            <a class="btn btn-info" href="{{route('admin.categories.show', ['category'=> $category->id])}}">Show</a>
                            <a class="btn btn-info" href="{{route('admin.categories.edit', ['category'=> $category->id])}}">Edit</a>

                            <a class="btn btn-danger" onclick="event.preventDefault();
                            this.nextElementSibling.submit();">
                                Delete
                            </a>

                            <form action="{{ route('admin.categories.destroy',['category' => $category->id]) }}" method="category" style="display: none;">
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
