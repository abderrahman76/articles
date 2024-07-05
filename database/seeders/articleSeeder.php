<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Factory(Article::class,10)->create();
        Article::factory()->count(10)->create();
    }
}
