<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::get();   // memunculkan semua records 
        // $posts = Post::take(6)->get();  // memunculkan hanya 6 records saja 
        // $posts = Post::paginate(6); // membatasi per halaman ada 6 records saja 
        // $posts = Post::simplePaginate(6); 
        return view('posts/index', ['posts' => Post::latest()->paginate(6)]);
    }

    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    public function create()
    {
        // membuka view form tambah data 
        return view('posts/create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);    // form create new post 
    }

    public function store(PostRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg, jpg, png, svg|max:2048'
        ]);
        $attrs = $request->all();

        $slug = \Str::slug(request('title'));
        $attrs['slug'] = $slug;

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/posts") : null;

        $attrs['category_id'] = request('category');
        $attrs['thumbnail'] = $thumbnail;

        $post = auth()->user()->posts()->create($attrs);
        $post->tags()->attach(request('tags'));

        session()->flash('success', 'Post berhasil disimpan!');
        return redirect('posts');
    }

    public function edit(Post $post)
    {
        // membuka form edit post 
        return view('posts/edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg, jpg, png, svg|max:2048'
        ]);

        $this->authorize('update', $post);
        if (request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail');
            $thumbnailUrl = $thumbnail->store("images/posts");
        } else {
            $thumbnailUrl = $post->thumbnail;
        }

        $attrs = $request->all();
        $attrs['category_id'] = request('category');
        $attrs['thumbnail'] = $thumbnailUrl;
        $post->update($attrs);
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'Post berhasil diupdate!');
        return redirect('posts');
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:8|max:16',
            'body' => 'required',
        ]);
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->is($post->author)) {
            \Storage::delete($post->thumbnail);
            $post->tags()->detach();
            $post->delete();
            session()->flash('success', 'Post berhasil dihapus!');
            return redirect('posts');
        } else {
            session()->flash('error', 'Post ini bukan milik anda!');
            return redirect('posts');
        }
    }
}
