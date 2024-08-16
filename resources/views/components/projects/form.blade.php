@props(['method' => 'GET'])
@props(['project' => null])
@props(['users' => null])

@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))

<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}"
      class="offset-3 col-6 shadow p-2 mb-5 bg-body-tertiary rounded d-flex flex-column card">
    @unless($_method)
        @method($method)
    @endunless

    @if($method !== 'GET')
        @csrf
    @endif

    <x-projects.input placeholder="Имя проекта"
                      name="name"
                      value="{{ $project['name'] ?? '' }}"/>
    <x-projects.select :users="$users"
                       name="owner_id"
                       value="{{ $project['owner_id'] ?? '' }}">Выберите владельца
    </x-projects.select>
    <x-projects.input placeholder="Дата сдачи проекта"
                      name="deadline_date"
                      value="{{ $project['deadline_date'] ?? '' }}"/>
    <x-projects.select :is_active="1"
                       name="is_active"
                       value="{{ $project['is_active'] ?? '' }}">Активен/неактивен
    </x-projects.select>
    <x-projects.select :users="$users"
                       name="assignee_id"
                       value="{{ $project['assignee_id'] ?? '' }}">Выберите ответсвенного
    </x-projects.select>
    {{ $slot }}
</form>