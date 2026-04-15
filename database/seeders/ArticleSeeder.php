<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::query()->get();

        if ($categories->isEmpty()) {
            $categories = Category::factory()->count(5)->create();
        }

        foreach ($categories as $category) {
            if ($category->articles()->exists()) {
                continue;
            }

            Article::factory()
                ->count(3)
                ->for($category)
                ->create();
        }
    }
}
