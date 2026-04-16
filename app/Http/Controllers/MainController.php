<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Получаем данные из JSON-файла
        $jsonPath = public_path('articles.json');
        
        // Проверяем, существует ли файл
        if (!file_exists($jsonPath)) {
            return view('main.hello', ['articles' => []]);
        }
        
        $jsonContent = file_get_contents($jsonPath);
        $articles = json_decode($jsonContent, true);
        
        // Отправляем данные на главную страницу
        return view('main.hello', ['articles' => $articles]);
    }
    
    public function gallery($id)
    {
        // Получаем данные из JSON-файла
        $jsonPath = public_path('articles.json');
        
        if (!file_exists($jsonPath)) {
            return view('main.gallery', ['article' => null]);
        }
        
        $jsonContent = file_get_contents($jsonPath);
        $articles = json_decode($jsonContent, true);
        
        // Ищем статью по id
        $article = null;
        foreach ($articles as $item) {
            if ($item['id'] == $id) {
                $article = $item;
                break;
            }
        }
        
        // Отправляем данные на страницу галереи
        return view('main.gallery', ['article' => $article]);
    }
}