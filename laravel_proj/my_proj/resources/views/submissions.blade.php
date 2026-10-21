@extends('layouts.app')

@section('title', 'Все отправленные сообщения')

@section('content')
    <h1>Все отправленные сообщения</h1>

    @if (empty($items))
        <p style="color: #666;">Пока нет ни одного сообщения. <a href="/form">Отправить первое</a>.</p>
    @else
        <p style="color: #666;">Всего записей: <strong>{{ count($items) }}</strong></p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background: #f3f4f6; text-align: left;">
                    <th style="padding: 10px; border: 1px solid #ddd;">#</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Имя</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Сообщение</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Дата</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Файл</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['name'] ?? '—' }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            <a href="mailto:{{ $item['email'] ?? '' }}">{{ $item['email'] ?? '—' }}</a>
                        </td>
                        <td style="padding: 10px; border: 1px solid #ddd; max-width: 300px; word-wrap: break-word;">
                            {{ $item['message'] ?? '—' }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ddd; white-space: nowrap;">
                            {{ $item['created_at'] ?? '—' }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 0.85em; color: #666;">
                            <code>{{ $item['filename'] ?? '—' }}</code>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p style="margin-top: 20px;">
        <a href="/form">← Отправить новое сообщение</a>
    </p>
@endsection