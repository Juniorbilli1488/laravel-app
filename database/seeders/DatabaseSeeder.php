<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()->count(10)->create();
    }
}