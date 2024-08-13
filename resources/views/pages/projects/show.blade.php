@extends('layouts.projects')

@section('content')
    Один проект
    <div>Айди - {{ $id }}</div>
    <div>Имя - {{ $name }}</div>
    <div>Айди владельца - {{ $owner_id }}</div>
    <div>Активен - @if($is_active)
            Да
        @else
            Нет
        @endif</div>
    <div>Дата сдачи - {{ $deadline_date }}</div>
    <div>Айди ответсвенного - {{ $assignee_id }}</div>
@endsection
