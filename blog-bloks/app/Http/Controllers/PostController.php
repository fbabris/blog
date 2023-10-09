<?php

namespace App\Http\Controllers;
use App\Models\Post;

use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated); 

        return redirect()
        ->route('posts.show', [$post])
        ->with('success', 'Post is submitted! Title: ' .
        $post->title . ' Description: ' .
        $post->description);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post has been deleted!');
    }
}
