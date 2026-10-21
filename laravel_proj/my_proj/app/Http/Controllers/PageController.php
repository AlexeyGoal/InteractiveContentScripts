<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        return view('submit-result', [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ]);
    }
}
