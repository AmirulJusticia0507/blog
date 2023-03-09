@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->author_name }} | {{ $post->created_at->toFormattedDateString() }}</p>
                    </div>
                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Comments</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($comments as $comment)
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $comment->author_name }} | {{ $comment->created_at->toFormattedDateString() }}</h4>
                                    {{ $comment->content }}
                                </div>
                            </div>
                        @endforeach

                        <hr>

                        <h4>Add Comment</h4>
                        <form method="POST" action="{{ route('comments.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="author_name">Name</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Comment</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
