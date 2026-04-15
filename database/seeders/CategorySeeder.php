<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Actualites',
            'Laravel',
            'PHP',
            'JavaScript',
            'CSS',
        ];

        foreach ($categories as $name) {
            Category::query()->firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
