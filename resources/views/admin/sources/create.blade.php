@extends('layouts.admin')

@section('title')
   Добавление ресурса @parent
@endsection

@section('header')
    <h1 class="h2">Добавить ресурса</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
           
        </div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="links">Ресурс ссылка</label>
                <input type="text" class="form-control" id="links" name="links" value="{{ old('links') }}">
            @error('links') <strong style="color:red;">{{ $message }}</strong> @enderror    
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
    <div>
        <a href="{{ route('admin.sources.store') }}" class="btn btn-primary">Загрузить ресурс</a>
    </div>
@endsection