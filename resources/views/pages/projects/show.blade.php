@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Проект - <x-slot name="name_project">{{ $name }}</x-slot>
    </x-projects.title>
    <div class="offset-3 col-6 shadow p-2 mb-5 bg-body-tertiary rounded d-flex flex-column card">
        <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">Айди - {{ $id }}</div>
        <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">Имя - {{ $name }}</div>
        <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">Айди владельца - {{ $owner_id }}</div>
        <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">Активен - {{ $is_active ? 'Да' : 'Нет' }}</div>
        <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">Дата сдачи - {{ $deadline_date }}</div>
        <div class=" p-2 d-flex justify-content-between in_table align-items-center">Айди ответсвенного - {{ $assignee_id }}</div>
        <div class="d-flex justify-content-end"><a href="{{ route('projects.edit',$id) }}?access=yes" class="btn btn-primary">Редактировать</a></div>
    <div>
@endsection
