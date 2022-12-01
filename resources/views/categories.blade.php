{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            @foreach ($categories as $item)
                <div class="col-md-4">
                    <a href="/blogs?category={{ $item->slug }}">
                        <div class="card text-bg-dark text-white">
                            <img src="https://source.unsplash.com/500x400/?{{ $item->name }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4"
                                    style="background-color: rgba(0, 0, 0, 0.5)">{{ $item->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
