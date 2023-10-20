@extends('layouts.app')

@section('header')
    @include('components.header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($allUserNews as $news)
                <div class="col-lg-6">
                    <a href="/dashboard/{{ $news->slug }}" class="text-dark">
                        <div class="card mx-2 my-3" style="height: 35rem">
                            <div class="position-absolute text-white px-2 py-2" style="background-color: rgba(0, 0, 0, 0.6)">
                                {{ $news->category->name }}</div>
                            <img src="https://source.unsplash.com/200x100/?{{ $news->category->name }}" class="card-img-top"
                                alt="...">
                            <div class="card-body overflow-hidden">
                                <h3 class="card-title"><b>{{ $news->title }}</b></h3>
                                <p class="card-text pb-0 pt-2">Author : <b>{{ $news->author->name }}</b></p>
                                <p class="card-text">Created : {{ $news->created_at->diffForHumans() }}</p>
                                <p class="card-text">{!! $news->body !!}</p>{!! $news->excerpt !!}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">{{ $allUserNews->links() }}</div>
    </div>
@endsection
