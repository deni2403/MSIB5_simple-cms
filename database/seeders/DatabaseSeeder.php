<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Deni',
            'email' => 'deni@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'National',
            'slug' => 'national'
        ]);

        Category::create([
            'name' => 'International',
            'slug' => 'international'
        ]);

        Category::create([
            'name' => 'Economy',
            'slug' => 'economy'
        ]);

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);

        Category::create([
            'name' => 'Sports',
            'slug' => 'sports'
        ]);

        Category::create([
            'name' => 'Life Style',
            'slug' => 'life-style'
        ]);

        News::factory(30)->create();
    }
}
