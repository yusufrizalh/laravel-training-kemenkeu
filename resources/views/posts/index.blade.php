@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                @if (isset($category))
                    <h3>Category: {{ $category->name }}</h3>
                @endif
                @if (isset($tag))
                    <h3>Tag: {{ $tag->name }}</h3>
                @endif
                @if (!isset($category) && !isset($tag))
                    <h3>All Posts</h3>
                @endif
                <hr>
            </div>
            <div>
                @if (Auth::check())
                    <a href="/posts/create" class="btn btn-primary">New Post</a>
                @else 
                    <a href="/login" class="btn btn-primary">Login to Create New Post</a>
                @endif
            </div>
        </div>
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 text-start">
                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <img src="{{ asset('images/my-images.jpg') }}" class="card-img-top" alt="my-images">
                        <div class="card-body">
                            <div>
                                <p class="card-text">{{ Str::limit($post->body, 100, '...') }}</p>
                            </div>
                            <a href="/posts/{{ $post->slug }}">Read more</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            Published on {{ $post->created_at->diffForHumans() }}
                            @auth
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        Tidak ada posts ditemukan!
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{-- membuat nomor halaman --}}
            {{ $posts->links() }}
        </div>
    </div>
@stop
