@extends('layouts.admin')

@section('title')
    Список ресурсов @parent
@endsection

@section('header')
    <h1 class="h2">Список ресурсов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
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
                    <th>Ресурс</th>
                    <th>Добавлен</th>
                    <th>Изменён</th>
                </tr>
            </thead>
            <tbody>
               
                @forelse($sources as $source)
                    <tr>
                        <td>{{ $source->id }}</td>
                        <td>{{ $source->links }}</td>
                        <td>{{ $source->created_at }}</td>
                        <td>{{ $source->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Ред.</a> &nbsp;
                            {{-- <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red;">Уд.</a> --}}
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{ $sources->links() }} --}}
    </div>
@endsection