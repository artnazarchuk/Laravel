@extends('layouts.admin')

@section('title')
   Редактирвать запись @parent
@endsection

@section('header')
    <h1 class="h2">Редактировать запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
           
        </div>
    </div>
@endsection

@section('content')
    <div>
        @include('inc.message')
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
                @error('author') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                
                <img src="{{ Storage::disk('public')->url($news->image) }}" style="width:250px;"> &nbsp;

                <a href="javascript:;" id="delete" rel="{{ $news->image }}">[X]</a>

                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            });
    </script>
@endpush
@push('js')
   <script>
       //Тут будет удаление картинки

        let element = document.getElementById('delete');

        element.addEventListener('click', function() {

            const url = element.getAttribute('rel');

            if(confirm('Подверждаете удаление картинки?')) {
                send('public/' + url).then( function () {
                    //location.reload();
                }); 
            }
        });

        async function send(url) {
            console.log( url );
        
        //     let response = await fetch(url, {
        //         method: 'POST'
        //             headers: {
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //             }
        //     });
            // let result = await response.json();

        }
   </script>
@endpush



