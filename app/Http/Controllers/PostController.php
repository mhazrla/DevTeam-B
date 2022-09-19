<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {
        $tagsInput = explode('#', $request->tags);
        $tags = array_filter($tagsInput, 'trim');

        $validatedData = $request->validated();
        if ($request->has('img')) {
            $validatedData['img'] = $request->file('img')->store('posts');
        }

        $post = $request->user()->posts()->create($validatedData);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }

        return to_route('home')->with('status', 'New post has been added.');
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = $post->tags->implode('name', '#');
        return view('posts.show', compact('post', 'tags', 'categories'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = $post->tags->implode('name', '#');
        return view('posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $tags = explode('#', $request->tags);

        if ($request->has('img')) {
            !is_null($post->img) && Storage::delete($post->img);
            $post->img = $request->file('img')->store('posts');
        }

        $post->update($request->validated() + [
            'img' => $post->img,
        ]);

        $newTags = [];

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }

        $post->tags()->sync($newTags);
        return to_route('home')->with('status', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        Storage::delete($post->img);
        $post->tags()->detach();
        $post->delete();

        return back()->with('status', 'Post has been deleted.');
    }
}
