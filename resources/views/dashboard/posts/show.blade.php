@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top"
                        alt="...">
                @endif

                <h2 class="mt-5">{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success mb-2">Back to my post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-2">Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are You Sure ?')" class="btn btn-danger mb-2">Delete</button>
                </form>
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
@endsection
