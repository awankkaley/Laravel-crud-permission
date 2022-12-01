@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center">{{ $title }}</h1>
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <form action="/blogs">

                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Search"
                        name="search" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>


    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="...">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                <p class="card-text">{{ $posts[0]->title }}</p>
                <small>By <a class="text-decoration-none"
                        href="/blogs?author={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                    in
                    <a class="text-decoration-none" href="/blogs?category={{ $posts[0]->category->slug }}">
                        {{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                    <p>{{ $posts[0]->excerpt }}</p>
                </small>
                <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 text-white"><a
                                    class="text-decoration-none text-white"
                                    href="/blogs?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/500x400/?{{ $item->category->name }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <small>By <a class="text-decoration-none"
                                        href="/blogs?author={{ $item->user->username }}">{{ $item->user->name }}</a>
                                    in
                                    <a class="text-decoration-none" href="/blogs?category={{ $item->category->slug }}">
                                        {{ $item->category->name }}</a> {{ $item->created_at->diffForHumans() }}
                                    </p>
                                    <p>{!! $item->excerpt !!}</p>
                                </small>
                                <a href="/blog/{{ $item->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4"> No Post Found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
