@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a href="/dashboard" class="btn btn-success mt-2">Back</a>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 my-3">
                <img src="https://source.unsplash.com/200x100/?{{ $news->category->name }}" class="card-img-top mb-2" alt="{{ $news->title }}">
                <h3>{{ $news->title }}</h3>
                <p class="card-text pb-0 pt-2">Author : <b>{{ $news->author->name }}</b></p>
                <p class="card-text">Created : {{ $news->created_at->diffForHumans() }}</p>
                <p>{!! $news->body !!}</p>
            </div>
        </div>
    </div>
@endsection
