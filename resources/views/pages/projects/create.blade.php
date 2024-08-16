@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Создать проект
    </x-projects.title>
    <div class="mb-2">
        <a href="{{ route('projects.index',['access' => 'yes']) }}" class="btn btn-primary">К списку</a>
    </div>
    <x-projects.form :users="$users" action="{{ route('projects.store', [ 'access' => 'yes' ]) }}" method="post">
        <x-projects.button type="submit">Создать</x-projects.button>
    </x-projects.form>
@endsection
