@extends('layout')

@section('title', $post->title)

@section('content')
<div class="post-item">
    <div class="post-content">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        @can('update', $post)
        <a href="{{ route('posts.edit', [$post]) }}">Edit Post</a>
        @endcan
        @can('delete', $post)
        <form action="{{ route('posts.destroy', [$post]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete" type = "submit">Delete post</button>
        </form>
        @endcan
        <small>Posted by <b>{{ $post->user->name }}</b></small>
    </div>
</div>
@endsection