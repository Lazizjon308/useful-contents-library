<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders in the correct order due to foreign key constraints
        $this->call([
            AuthorSeeder::class,  // Authors have no dependencies
            GenreSeeder::class,   // Genres have no dependencies
            CategorySeeder::class, // categories have no dependencies
            ContentSeeder::class,  // Content depends on categories and indirectly on authors
        ]);
    }
}
