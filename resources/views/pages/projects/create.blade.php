@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Создать проект
    </x-projects.title>
    <x-projects.form :users="$users">
        <x-projects.button>Создать</x-projects.button>
    </x-projects.form>

    <x-alert type_alert="success">
        <x-slot name="title">
            Заголовок алерта
        </x-slot>
        <x-slot name="message">
            Сообщение алерта
        </x-slot>
    </x-alert>
@endsection
