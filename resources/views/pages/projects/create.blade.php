@extends('layouts.projects')

@section('content')
    <h1>Создать проект</h1>
    <form>
        <input type="text" placeholder="Имя проекта">
        <select>
            <option selected disabled>Выберите владельца</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <input type="text" placeholder="Дата сдачи">
        <select>
            <option>Активен</option>
            <option selected>Неактивен</option>
        </select>
        <select>
            <option selected disabled>Выберите ответсвенного</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <form>

@endsection
