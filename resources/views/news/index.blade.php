@extends('layouts.main')

@section('title')
  Список новостей @parent
@endsection

@section('header')
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Cписок новостей</h1>
    </div>
  </div>
@endsection

@section('content')
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse($newsList as $news)
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <div class="h5">
                <strong>
                    <a href="{{ route('news.show', ['news' => $news->id]) }}">
                        {{ $news->title }}
                    </a>
                </strong>
            </div>
            <p class="card-text">{!! $news->description !!}</p> {{-- '{!! !!}'- это для подключения тегов в контроллере --}}
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <form action="{{ route('news.show', ['news' => $news->id]) }}">
                  <button class="btn btn-sm btn-outline-secondary">Смотреть подробнее</button>
                </form> 
              </div>
              <small class="text-muted">{{ now('Europe/Moscow') }}</small>
            </div>
              <div>Автор: {{ $news->author }}</div> {{-- '{{ }}'- это для экранирования --}}
          </div>
        </div>
      </div>
    @empty
      <h2>Новостей нет</h2>
    @endforelse
  </div>
@endsection
