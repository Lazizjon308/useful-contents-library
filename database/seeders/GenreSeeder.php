<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Fiction',
            'Non-Fiction',
            'Science Fiction',
            'Fantasy',
            'Romance',
            'Mystery',
            'Thriller',
            'Horror',
            'Biography',
            'History',
            'Self-Help',
            'Business',
            'Programming',
            'Technology',
            'Science',
            'Art',
            'Music',
            'Philosophy',
            'Poetry',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

