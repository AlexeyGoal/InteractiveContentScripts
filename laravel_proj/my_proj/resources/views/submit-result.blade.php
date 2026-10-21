@extends('layouts.app')

@section('title', 'Успешная отправка')

@section('content')
    <div style="background: #efe; border: 1px solid #9f9; padding: 15px; border-radius: 4px;">
        <h1>✅ Форма успешно отправлена!</h1>
        <p><strong>Имя:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Файл сохранён:</strong> <code>{{ $filename }}</code></p>
        <p style="font-size: 0.9em; color: #666;">
            Данные сохранены в <code>storage/app/submissions/{{ $filename }}</code>
        </p>
    </div>
    <p style="margin-top: 15px;"><a href="/form">← Отправить ещё одно сообщение</a></p>
@endsection