@extends('layouts.layout')

@section('content')
<div class="col-sm-8 blog-main">
    <h1> {{  $post->title  }} </h1>
    <p> {{  $post->body  }} </p>

    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <strong>
                    {{  $comment->created_at->diffforHumans()  }}:&nbsp
                </strong>
                {{  $comment->body  }}
            </li>
            @endforeach
        </ul>

    </div>

    <hr>

    {{-- Add comment form --}}
    <div class="card">
        <div class="card-block">
            <form action="/posts/{{$post->id}}/comments" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="body" name="body" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Add Comment</button>
                </div>
            </form>

           
                <br><br>
                @include('layouts.errors')
            
            
        </div>
    </div>

</div>

@endsection