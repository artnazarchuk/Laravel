@extends('layouts.admin')

@section('title')
    Список пользователей @parent
@endsection

@section('header')
    <h1 class="h2">Список пользователей</h1>
@endsection

@section('content')
    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Добавлен</th>
                    <th>Изменён</th>
                    <th>Роль</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user-> email}}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Ред.</a> &nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red;">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{ $users->links() }} --}}
    </div>
@endsection

{{-- {{ dd($users); }} --}}

{{-- "id" => 1
"name" => "Администратор"
"email" => "Sel_IT@tut.by"
"email_verified_at" => null
"password" => "$2y$10$6aLv55vZWwk1Ym7lMun/Y.v1SFR2K5BTyoSOZVCgscwLmVpT55OUa"
"remember_token" => "DN9vdPNUmbbpdoF4QbyTMXJA7E6tEuNMZVpa1dqhc0lcBt7UlADgqNhgxoct"
"created_at" => "2022-02-06 10:25:05"
"updated_at" => "2022-02-06 12:38:00"
"last_login_at" => null
"is_admin" => 1 --}}