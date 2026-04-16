<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новая статья</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        h2 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📰 Новостной портал</h1>
        </div>
        <div class="content">
            <h2>Опубликована новая статья!</h2>
            <p><strong>Заголовок:</strong> {{ $article->title }}</p>
            <p><strong>Краткое описание:</strong></p>
            <p>{{ $article->short_description }}</p>
            <p><strong>Дата публикации:</strong> {{ $article->created_at->format('d.m.Y H:i') }}</p>
            <a href="{{ url('/articles/' . $article->id) }}" class="btn">Читать статью</a>
        </div>
        <div class="footer">
            <p>Это письмо отправлено автоматически. Пожалуйста, не отвечайте на него.</p>
            <p>&copy; {{ date('Y') }} Новостной портал. Все права защищены.</p>
        </div>
    </div>
</body>
</html>