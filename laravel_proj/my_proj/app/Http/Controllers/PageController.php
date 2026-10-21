<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Hello, World!';
    }

    
    public function showForm()
    {
        return '
            <form method="POST" action="/submit">
                ' . csrf_field() . '
                <label>Имя: <input type="text" name="name" required></label>
                <label>Email: <input type="email" name="email" required></label>
                <button type="submit">Отправить</button>
            </form>
        ';
    }

    
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        return "Форма успешно отправлена!<br>Имя: {$validated['name']}<br>Email: {$validated['email']}";
    }
}
