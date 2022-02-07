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
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                {{-- @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror --}}
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                {{-- @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror --}}
            </div>
            <div class="form-group">
                <label for="is_admin">Роль</label>
                <input type="is_admin" class="form-control" id="is_admin" name="is_admin" value="{{ $user->is_admin }}">
                {{-- @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror --}}
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection

