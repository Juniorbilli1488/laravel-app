<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Запускаем сидер ролей
        $this->call(RoleSeeder::class);

        // Создаем модератора
        User::create([
            'name' => 'Модератор',
            'email' => 'moderator@test.ru',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        // Создаем 10 фейковых статей
        Article::factory()->count(10)->create();
    }
}