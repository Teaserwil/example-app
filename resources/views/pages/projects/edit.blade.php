@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Редактировать проект - <x-slot name="name_project">{{ $project['name'] }}</x-slot>
    </x-projects.title>
    <x-projects.form :project="$project" :users="$users">
        <x-projects.button>Сохранить изменения</x-projects.button>
    </x-projects.form>
@endsection
