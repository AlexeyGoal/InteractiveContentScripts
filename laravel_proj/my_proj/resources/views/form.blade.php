@extends('layouts.app')

@section('title', 'Форма обратной связи')

@section('content')
    <h1>Отправьте сообщение</h1>
    <form method="POST" action="/submit">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Имя: <input type="text" name="name" required></label>
        </div>
        <div style="margin-bottom: 10px;">
            <label>Email: <input type="email" name="email" required></label>
        </div>
        <button type="submit">Отправить</button>
    </form>
@endsection