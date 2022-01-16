@extends('layouts.main')

@section('header')
    <div>
        <h1>{{ $newsItem['title'] }}</h1>
    </div>
@endsection
    
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-3">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <div class="h5">
                    <strong>{{ $newsItem['title'] }}</strong>
                </div>
                <p class="card-text">{{ $newsItem['description'] }}</p> 
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ now('Europe/Moscow') }}</small>
                </div>
                <div>Автор: {{ $newsItem['author'] }}</div>
            </div>
        </div>
    </div>
@endsection