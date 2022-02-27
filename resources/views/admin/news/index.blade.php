@extends('layouts.admin')

@section('title')
    Список новостей @parent
@endsection

@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">

        @include('inc.message')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Загаловок</th>
                    <th>Статус</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ optional($news->category)->title }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->description }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a> &nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color:red;">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
  
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.delete');
            elements.forEach(function (element, key) {
                element.addEventListener('click', function() {
                const id = element.getAttribute('rel');
                    if(confirm('Подверждаете удаление с записи ID =' + id + ' ?')) {
                        send('/admin/news/' + id).then( function () {
                            location.reload();
                        }); 
                    }
                })
            });
        });

        async function send(url) {
            console.log(url);
            let response = await fetch(url, {
                method: 'DELETE', 
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush