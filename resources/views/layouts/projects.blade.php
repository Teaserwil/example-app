<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Проекты</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <style>
        .in_table div {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
@if ($errors->any())
    <x-alert type_alert="warning">
        <x-slot name="title">
            Ошибка!
        </x-slot>
        <x-slot name="message">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </x-slot>
    </x-alert>
@endif
@if($alert = session()->pull('alert'))
    <x-alert type_alert="{{ $alert['type'] ? $alert['type'] : 'note' }}">
        <x-slot name="title">
            {{ $alert['title'] ? $alert['title'] : '' }}
        </x-slot>
        <x-slot name="message">
            {{ $alert['message'] ? $alert['message'] : '' }}
        </x-slot>
    </x-alert>
@endif
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>