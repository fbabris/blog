@extends('layout')

@section('title', 'home')

@section ('content')
    @forelse ($posts as $post)
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
            </div>
        </div>
        @empty
        <h2>There are no posts yet</h2>
    @endforelse
@endsection