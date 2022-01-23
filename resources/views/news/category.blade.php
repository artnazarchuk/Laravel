
@extends('layouts.main')

@section('title')
  Список категорий @parent
@endsection

@section('header')
    <div>
        <h1>Список категорий</h1>
    </div>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
        @foreach($category as $newsItem)
        <div class="col">
            <div class="card shadow-sm">
                <div>
                    <h4>
                        {{-- Начнём работаь тут обработа модели и контроллеров--}}
                        <a href="{{ route('news.index') }}"> 
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        {{ $newsItem['title'] }}
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection


