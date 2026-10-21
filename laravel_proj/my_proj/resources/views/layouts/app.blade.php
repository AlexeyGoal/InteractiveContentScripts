<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Мой Laravel Проект')</title>
</head>
<body>
    {{-- Вставка хедера --}}
    @include('partials.header')

    <main style="padding: 20px;">
        {{-- Основной контент страницы --}}
        @yield('content')
    </main>

    {{-- Вставка футера --}}
    @include('partials.footer')
</body>
</html>