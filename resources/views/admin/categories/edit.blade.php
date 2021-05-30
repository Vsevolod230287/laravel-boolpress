@extends('layouts.app')

@section('content')
<div class="admin-categories-edit row">
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
              <li><a href="{{route('admin.categories.index')}}">categories</a></li>
              <li><a href="#">Users</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="#">Tags</a></li>
          </ul>
      </div>
  </div>



            <div class="col-8">
                <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $category->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Salva</button>
                </form>
            </div>
        </div>
</div>
@endsection
