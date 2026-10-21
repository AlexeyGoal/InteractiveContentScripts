<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
       return view('home');
    }

    
    public function showForm()
    {
       return view('form');
    }

    
    public function submit(Request $request)
    {
        
        $validated = $request->validate([
            'name'  => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5|max:2000',
        ], [
           
            'name.required'    => 'Поле «Имя» обязательно для заполнения.',
            'name.min'         => 'Имя должно содержать минимум 2 символа.',
            'name.max'         => 'Имя не должно превышать 255 символов.',
            'email.required'   => 'Поле «Email» обязательно для заполнения.',
            'email.email'      => 'Введите корректный email-адрес.',
            'message.required' => 'Поле «Сообщение» обязательно для заполнения.',
            'message.min'      => 'Сообщение должно содержать минимум 5 символов.',
            'message.max'      => 'Сообщение не должно превышать 2000 символов.',
        ]);

        
        $filename = 'submission_' . now()->format('Ymd_His') . '_' . Str::random(8) . '.json';

        
        $directory = storage_path('app/submissions');

        
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

    
        $data = [
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'message'    => $validated['message'],
            'created_at' => now()->toDateTimeString(),
            'ip'         => $request->ip(),
        ];

        
        file_put_contents(
            $directory . '/' . $filename,
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );

        
        return view('submit-result', [
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'filename' => $filename,
        ]);
    }

    public function submissions()
    {
        $directory = storage_path('app/submissions');
        $items = [];

        if (is_dir($directory)) {
            // Получаем все .json файлы
            $files = File::glob($directory . '/*.json');

            foreach ($files as $file) {
                $content = file_get_contents($file);
                $data = json_decode($content, true);

                if (is_array($data)) {
                    
                    $data['filename'] = basename($file);
                    $items[] = $data;
                }
            }
        }

        
        usort($items, function ($a, $b) {
            return strcmp($b['created_at'] ?? '', $a['created_at'] ?? '');
        });

        return view('submissions', ['items' => $items]);
    }


}
