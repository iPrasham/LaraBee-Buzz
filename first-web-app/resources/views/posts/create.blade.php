@extends('layouts.layout')

@section('content')

<div class="col-sm-8">
  <h1>Create a Post</h1>
  <hr>

  <form method="POST" action="/posts">
    {{ csrf_field() }}

    {{-- without this form will not be submitted
            its an hidden input field with hashed value
            which is compared by laravel when the form is submitted --}}

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">PUBLISH</button>
    </div>

    {{-- @if (count($errors))             
    <div class="form-group">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif --}}

    {{-- including above error in errors.blade.php so that we can reuse it in other forms to. --}}
    @include('layouts.errors')              
    
  </form>
</div>
@endsection