@extends('layouts.projects')

@section('content')
    <h1>Редактировать проект</h1>
    <form>
        <input type="text" placeholder="Имя проекта" value="{{ $project['name'] }}">
        <select>
            <option disabled>Выберите владельца</option>
            @foreach($users as $user)
                <option @if($user->id == $project['owner_id'])
                            selected
                        @endif value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <input type="text" placeholder="Дата сдачи" value="{{ $project['deadline_date'] }}">
        <select>
            <option>Активен</option>
            <option selected>Неактивен</option>
        </select>
        <select>
            <option disabled>Выберите ответсвенного</option>
            @foreach($users as $user)
                <option @if($user->id == $project['owner_id'])
                            selected
                        @endif value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <form>
@endsection
