<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'Модератор',
            'slug' => 'moderator',
        ]);

        Role::create([
            'name' => 'Читатель',
            'slug' => 'reader',
        ]);
    }
}