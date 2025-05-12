<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Books',
            'Articles',
            'Blog Posts',
            'Research Papers',
            'Tutorials',
            'Documentation',
            'Podcasts',
            'Videos',
            'Courses',
            'Presentations',
            'Case Studies',
            'Whitepapers',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

