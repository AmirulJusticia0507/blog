@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        <hr>
        @foreach ($posts as $post)
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text"><small class="text-muted">By {{ $post->author }} on {{ $post->created_at }}</small></p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
