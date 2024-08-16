@extends('layouts.projects')

@section('content')
    <x-projects.title>
        Список проектов
    </x-projects.title>
    <div class="mb-2">
        <a href="{{ route('projects.create',['access' => 'yes']) }}" class="btn btn-primary">Добавить новый</a>
    </div>
    <div class="col-12 shadow p-2 mb-5 bg-body-tertiary rounded d-flex flex-column card">
        <div class="dt p-2 border-bottom d-flex justify-content-between in_table align-items-center">
            <div>id</div>
            <div>Имя проекта</div>
            <div>id владельца</div>
            <div>Активен</div>
            <div>Дата сдачи</div>
            <div>id Ответственного</div>
            <div></div>
            <div></div>
        </div>
        @foreach($listProjects as $project)
            <div class="border-bottom p-2 d-flex justify-content-between in_table align-items-center">
                <div>{{ $project['id'] }}</div>
                <div>
                    <a href="{{ route('projects.show', ['project' => $project['id'], 'access' => 'yes']) }}">{{ $project['name'] }}</a>
                </div>
                <div>{{ $project['owner_id'] }}</div>
                <div>{{ $project['is_active'] ? 'Да' : 'Нет' }}</div>
                <div>{{ $project['deadline_date'] }}</div>
                <div>{{ $project['assignee_id'] }}</div>
                <div><a href="{{ route('projects.edit',['project' => $project['id'], 'access' => 'yes']) }}"
                        class="btn btn-outline-info pull-right">Редактировать</a></div>
                <div>
                    <form method="POST" action="{{ route('projects.destroy',['project' => $project['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="access" value="yes">
                        <button type="submit" class="btn btn-outline-danger pull-right">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
