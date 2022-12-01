@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-5">{{ $title }}</h1>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top"
                    alt="...">
                <h2 class="mt-5">{{ $post->title }}</h2>
                <p>By <a class="text-decoration-none"
                        href="/blogs?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                    in <a class="text-decoration-none" href="/blogs?category={{ $post->category->slug }}">
                        {{ $post->category->name }}</a>
                </p>
                <p>{!! $post->body !!}</p>
                <a class="text-decoration-none" href="/blogs">Back to blogs</a>
            </div>
        </div>
    </div>
@endsection
