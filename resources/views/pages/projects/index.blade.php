@extends('layouts.projects')

@section('content')
    <h1>Проекты список</h1>
    <div>
        <a href="{{ route('projects.create',['access' => 'yes']) }}">Добавить новый</a>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>Имя проекта</th>
            <th>id владельца</th>
            <th>Активен</th>
            <th>Дата сдачи</th>
            <th>id Ответственного</th>
            <th></th>
        </tr>
        @foreach($listProjects as $project)
            <tr>
                <td>{{ $project['id'] }}</td>
                <td><a href="{{ route('projects.show',$project['id']) }}?access=yes">{{ $project['name'] }}</a></td>
                <td>{{ $project['owner_id'] }}</td>
                <td>@if($project['is_active'])
                        Да
                    @else
                        Нет
                    @endif</td>
                <td>{{ $project['deadline_date'] }}</td>
                <td>{{ $project['assignee_id'] }}</td>
                <td><a href="{{ route('projects.edit',$project['id']) }}?access=yes">Редактировать</a></td>
            </tr>
        @endforeach
    </table>
@endsection
