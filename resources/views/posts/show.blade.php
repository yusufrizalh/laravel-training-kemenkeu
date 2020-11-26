@extends('layouts/master')

{{-- @section('title', 'New Post') --}}
{{-- @section('title', $slug) --}}
@section('title', $post->title)

@section('content')
    <div class="container">
        {{-- <p>{{ $slug }}</p> --}}
        <h3>{{ $post->title }}</h3>
        <div class="text-secondary">
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> &middot;
            {{ $post->created_at->format('d M Y') }}
            &middot;
            @foreach ($post->tags as $tag)
                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
            @endforeach
        </div>
        <hr>
        <p>{{ $post->body }}</p>

        <div>
            <div class="text-secondary">
                Author: {{ $post->author->name }}
            </div>
            {{-- @auth --}}
            @if(auth()->user()->is($post->author))
            <button type="submit" class="btn btn-link text-danger btn-sm p-0" data-toggle="modal"
                data-target="#exampleModal">
                Delete
            </button>

            {{-- mengakses Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapusnya?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <div> {{ $post->title }} </div>
                                <div class="text-seondary">
                                    <small>Published: {{ $post->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                            <form action="/posts/{{ $post->slug }}/delete" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex">
                                    <button class="btn btn-danger mr-3" type="submit">Yakin</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <p>Copyright @Inixindo | 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endif
            {{-- @endauth --}}
    </div>
@endsection
