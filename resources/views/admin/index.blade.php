@extends('layouts.app')

@section('content')

<div class="side-bar col-xl-2">
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Posts</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">Tags</a></li>
    </ul>
</div>

    <div class="card col-xl-2">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
</div>
@endsection
