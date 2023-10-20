@extends('layouts.app')

@section('header')
    @include('components.header')
@endsection


@section('content')
    <div class="container-fluid px-3">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <a href="/news/create" class="btn btn-primary my-3">Add News</a>
                <table class="table table-bordered table-striped">
                    <tr class="text-center bg-dark">
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($allNews as $news)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $news->title }}</td>
                            <td class="text-center">{{ $news->category->name }}</td>
                            <td class="text-center">{{ $news->slug }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="/news/{{ $news->slug }}" class="btn btn-success mx-1" title="Show"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="/news/{{ $news->slug }}/edit" class="btn btn-warning mx-1" title="Edit"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form action="/news/{{ $news->slug }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger mx-1" title="Delete" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
