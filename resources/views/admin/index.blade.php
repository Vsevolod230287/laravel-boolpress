@extends('layouts.app')

@section('content')
<div class="admin-index">
    <div class="box-side-bar ">


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

</div>

@endsection
