<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get IDs to use for relationships
        $categoryIds = Category::pluck('id')->toArray();
        $authorIds = Author::pluck('id')->toArray();
        
        $contents = [
            [
                'title' => 'Introduction to Laravel',
                'description' => 'A comprehensive guide to getting started with Laravel framework.',
                'url' => 'https://example.com/intro-to-laravel',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [1, 3],
            ],
            [
                'title' => 'Modern JavaScript Concepts',
                'description' => 'Learn about the latest JavaScript features and best practices.',
                'url' => 'https://example.com/modern-javascript',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [2, 5],
            ],
            [
                'title' => 'Database Design Principles',
                'description' => 'A guide to designing efficient and scalable databases.',
                'url' => null,
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => '/storage/documents/database-design.pdf',
                'authors' => [4],
            ],
            [
                'title' => 'API Development with Node.js',
                'description' => 'Learn how to build RESTful APIs using Node.js and Express.',
                'url' => 'https://example.com/api-development-nodejs',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [1, 6],
            ],
            [
                'title' => 'Introduction to Docker',
                'description' => 'Learn the basics of containerization with Docker.',
                'url' => null,
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => '/storage/documents/docker-intro.pdf',
                'authors' => [3, 7],
            ],
            [
                'title' => 'CSS Grid Layout',
                'description' => 'A comprehensive guide to using CSS Grid for modern layouts.',
                'url' => 'https://example.com/css-grid',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [2, 8],
            ],
            [
                'title' => 'Python for Data Science',
                'description' => 'Getting started with Python for data analysis and visualization.',
                'url' => 'https://example.com/python-data-science',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [4, 5],
            ],
            [
                'title' => 'Git Workflow Strategies',
                'description' => 'Learn effective Git branching strategies for team collaboration.',
                'url' => null,
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => '/storage/documents/git-workflows.pdf',
                'authors' => [1, 8],
            ],
            [
                'title' => 'Mobile UI Design Principles',
                'description' => 'Best practices for designing user-friendly mobile interfaces.',
                'url' => 'https://example.com/mobile-ui-design',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [6, 7],
            ],
            [
                'title' => 'AWS Cloud Architecture',
                'description' => 'Designing scalable and resilient applications on AWS.',
                'url' => 'https://example.com/aws-architecture',
                'category_id' => $this->getRandomId($categoryIds),
                'path_file' => null,
                'authors' => [3, 4],
            ],
        ];

        foreach ($contents as $content) {
            // Extract authors before inserting content
            $contentAuthors = $content['authors'];
            unset($content['authors']);
            
            // Insert content
            $contentId = DB::table('contents')->insertGetId([
                'title' => $content['title'],
                'description' => $content['description'],
                'url' => $content['url'],
                'category_id' => $content['category_id'],
                'path_file' => $content['path_file'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Create author_content relationships
            foreach ($contentAuthors as $authorId) {
                if ($authorId <= count($authorIds)) {
                    DB::table('author_content')->insert([
                        'author_id' => $authorId,
                        'content_id' => $contentId,
                    ]);
                }
            }
        }
    }
    
    /**
     * Get a random ID from an array of IDs.
     */
    private function getRandomId(array $ids): int
    {
        return $ids[array_rand($ids)];
    }
}

