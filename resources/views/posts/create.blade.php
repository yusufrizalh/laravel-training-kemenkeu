@extends('layouts/master', ['title' => 'New Post'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Post</div>
                    <div class="card-body">
                        <form action="/posts/store" method="POST">
                            @csrf
                            @include('posts/partials/form-control', ['submit' => 'Create New Post'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
