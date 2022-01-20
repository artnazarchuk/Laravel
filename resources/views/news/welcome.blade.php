@extends('layouts.main')

@section('title')
  Добро пожаловать! @parent
@endsection

@section('header')
    
    <div>
        <h1>На этом сайте вы найдете много новых новостей</h1>
    </div>
@endsection

@section('content')

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-3">
    <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        <div class="card-body">
            <div class="h2">
                <a href="{{ route('news.categories') }}">Перейти к категориям новостей</a>
            </div>
        </div>
    </div>
</div>
<br/>
<div>
    <form method="post">
        <div class="form-group">
            <label for="name">Ваше имя</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="commit">Ваш комментарий</label>
            <textarea class="form-control" name="commit" id="commit"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="float: right;">Оставить комментарий</button>
    </form>
</div>
<br/>
@endsection
