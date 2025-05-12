<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'John Smith',
                'url' => 'https://example.com/john-smith',
            ],
            [
                'name' => 'Jane Doe',
                'url' => 'https://example.com/jane-doe',
            ],
            [
                'name' => 'Robert Johnson',
                'url' => 'https://example.com/robert-johnson',
            ],
            [
                'name' => 'Emily Chen',
                'url' => 'https://emilychenbooks.com',
            ],
            [
                'name' => 'Michael Brown',
                'url' => null,
            ],
            [
                'name' => 'Sarah Williams',
                'url' => 'https://sarahwilliamswriter.net',
            ],
            [
                'name' => 'David Rodriguez',
                'url' => null,
            ],
            [
                'name' => 'Lisa Parker',
                'url' => 'https://lisaparker.me',
            ],
        ];

        foreach ($authors as $author) {
            DB::table('authors')->insert([
                'name' => $author['name'],
                'url' => $author['url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

