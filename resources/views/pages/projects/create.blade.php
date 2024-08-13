@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Создать проект
    </x-projects.title>
    <x-projects.form :users="$users">
        <x-projects.button>Создать</x-projects.button>
    </x-projects.form>
@endsection
