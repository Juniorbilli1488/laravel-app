<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    // Просмотр списка (доступно всем)
    public function viewAny(?User $user): bool
    {
        return true;
    }

    // Просмотр одной статьи (доступно всем)
    public function view(?User $user, Article $article): bool
    {
        return true;
    }

    // Создание статьи (только модератор)
    public function create(User $user): bool
    {
        return $user->isModerator();
    }

    // Редактирование статьи (только модератор)
    public function update(User $user, Article $article): bool
    {
        return $user->isModerator();
    }

    // Удаление статьи (только модератор)
    public function delete(User $user, Article $article): bool
    {
        return $user->isModerator();
    }
}