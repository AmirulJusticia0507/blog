@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add a Comment</h1>
        <hr>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
