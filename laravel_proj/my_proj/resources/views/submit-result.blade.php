@extends('layouts.app')

@section('title', 'Результат отправки')

@section('content')
    <h1>Форма успешно отправлена!</h1>
    <p><strong>Имя:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <a href="/form">← Вернуться к форме</a>
@endsection