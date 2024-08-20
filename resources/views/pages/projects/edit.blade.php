@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Редактировать проект -
        <x-slot name="name_project">{{ $project['name'] }}</x-slot>
    </x-projects.title>
    <div class="mb-2">
        <a href="{{ route('projects.index') }}" class="btn btn-primary">К списку</a>
    </div>
    <x-projects.form
        :project="$project"
        :users="$users"
        action="{{ route('projects.update', [
                    'project' => $project['id'],
                    'access' => 'yes',
                    ])
                }}"
        method="put">
        <x-projects.button type="submit">Сохранить изменения</x-projects.button>
    </x-projects.form>
@endsection
