@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

                <h1>{{ $post->title }}</h1>

                <div class="card-body">
                    {{ $post->content }}
              <h4>Category: </h4><a class="btn btn-info" href="{{ route('category.index', ['slug'=> $post->slug]) }}"></a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
