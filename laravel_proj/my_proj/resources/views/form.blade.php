@extends('layouts.app')

@section('title', 'Форма обратной связи')

@section('content')
    <h1>Отправьте сообщение</h1>

    {{-- Блок общих ошибок (если есть) --}}
    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #f99; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <strong>Пожалуйста, исправьте следующие ошибки:</strong>
            <ul style="margin: 8px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/submit">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name">Имя:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   style="width: 100%; padding: 6px; @error('name') border-color: #f99; @enderror">
            @error('name')
                <div style="color: #c00; font-size: 0.9em; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   style="width: 100%; padding: 6px; @error('email') border-color: #f99; @enderror">
            @error('email')
                <div style="color: #c00; font-size: 0.9em; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="message">Сообщение:</label><br>
            <textarea name="message" id="message" rows="5"
                      style="width: 100%; padding: 6px; @error('message') border-color: #f99; @enderror">{{ old('message') }}</textarea>
            @error('message')
                <div style="color: #c00; font-size: 0.9em; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="padding: 8px 20px;">Отправить</button>
    </form>
@endsection