@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Posts Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn  btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-info"> <span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"> <span
                                    data-feather="edit"></span></a>
                            @can('delete categories')
                                <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Are You Sure ?')" class="badge bg-danger border-0 "><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
