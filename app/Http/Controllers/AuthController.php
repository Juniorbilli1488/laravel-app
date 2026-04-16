<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Метод create - показывает форму регистрации
    public function create()
    {
        return view('auth.signin');
    }
    
    // Метод registration - обрабатывает данные из формы
    public function registration(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        
        // Возвращаем JSON-ответ
        return response()->json([
            'success' => true,
            'message' => 'Регистрация прошла успешно!',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]
        ], 200);
    }
}